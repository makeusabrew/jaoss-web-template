Jaoss Web Template
==================

A bare-bones project tree required to get a very simple website up and running
using the [jaoss library](http://github.com/makeusabrew/jaoss).

Getting Started
---------------

The chances are you don't really want a versioned checkout of this repository
but instead want a clean copy of it which you'll create a new git repo with -
right?

Git doesn't *seem* to provide an easy way of doing this, but the following
steps will get you there. Any improvements please, let me know:

1. git clone --recursive git://github.com/makeusabrew/jaoss-web-template.git <my_new_project_folder>
2. change into your newly cloned git repo, and then:
3. rm -rf my_new_project_folder/.git
3. git init
4. git add .
5. git commit -a -m "my initial commit"

The above steps are important - creating the submodule first means you'll get
the [jaoss library](http://github.com/makeusabrew/jaoss) at the same revision
number pointed to by the head of the jaoss web template project - if you just
called git submodule add git://github.com/makeusabrew/jaoss.git jaoss then you'd
get the library at its current head, which may not be quite right.
