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

1. git clone --recursive git://github.com/makeusabrew/jaoss-web-template.git **my_new_project_folder**
2. change into your newly cloned git repo, and then:
3. rm -rf .git/
3. git init
4. git add .
5. git commit -a -m "my initial commit"

The above steps are important - creating the submodule first means you'll get
the [jaoss library](http://github.com/makeusabrew/jaoss) at the same revision
pointed to by the head of the jaoss web template project - if you just called
**git submodule add git://github.com/makeusabrew/jaoss.git jaoss** then you'd
get the library at its current head, which may not be quite right.

License
-------

(The MIT License)

Copyright (C) 2011 by Nick Payne <nick@kurai.co.uk> 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE