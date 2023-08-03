#!/bin/sh
/opt/lampp/lampp startapache
/opt/lampp/lampp startmysql
tail -f /dev/null
