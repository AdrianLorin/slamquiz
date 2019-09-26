@ECHO OFF

REM   

CALL cd ..
CALL cd ..
CALL cd wamp
CALL cd www
CALL cd slamquiz
CALL php -S localhost:8000 -t public

REM

PAUSE