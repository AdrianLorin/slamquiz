@ECHO OFF

REM   

CALL cd ..
CALL cd ..
CALL cd AL
CALL cd php
CALL cd symfony
CALL cd slamquiz
CALL php -S localhost:8000 -t public

REM

PAUSE