<?php
$xhprof = function_exists("xhprof_enable");

if ($xhprof) {
    xhprof_enable();
}

$start = microtime(true);
include 'index.php';
$end = microtime(true);

if ($xhprof) {
    $xhprofData = xhprof_disable();
}


$responseMs = round(($end - $start)*1000, 1);

StatsD::timing("response", $responseMs);

$response = JaossRequest::getInstance();
$url = $response->getUrl();
$qs = $response->getQueryString();
if (strlen($qs)) {
    $url .= "?".$qs;
}
if (class_exists("ProfileDb")) {
    Log::info("[".$responseMs."ms / ".ProfileDb::getTotalQueryTimeMs()."ms db / ".ProfileDb::getQueryCount()." queries] for ".$response->getMethod()." [".$url."]");
    Log::db  ("[".$responseMs."ms / ".ProfileDb::getTotalQueryTimeMs()."ms db / ".ProfileDb::getQueryCount()." queries] for ".$response->getMethod()." [".$url."]");
} else {
    Log::info("[".$responseMs."ms] for ".$response->getMethod()." [".$url."]");
}

if (isset($xhprofData) && Settings::getValue("xhprof", "enabled", false)) {
    $XHPROF_ROOT = Settings::getValue("xhprof", "root");
    include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_lib.php";
    include_once $XHPROF_ROOT . "/xhprof_lib/utils/xhprof_runs.php";

    $xhprof_runs = new XHProfRuns_Default();

    $run_id = $xhprof_runs->save_run($xhprofData, Settings::getValue("site", "namespace"));

    Log::info("XHPROF run ID [".Settings::getValue("xhprof.host")."/index.php?run=".$run_id."&source=".Settings::getValue("site", "namespace")."] saved");
}
