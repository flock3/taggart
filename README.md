Taggart
=======

Version control system tag controller.

The project aims to integrate with initially mercurial but in short order also Git, and be able to create and view tags
within the repositories of that software.

Limitations
-----------

The system currently uses the command line to exec commands for requesting available tags and so on, this not only
presents a mild security vulnerability (although inputs are checked and sanitized) this also requires your server
allows the exec() command to be run on your installation on PHP. Shared web hosting is not advised for this software,
and should really only be used internally.
