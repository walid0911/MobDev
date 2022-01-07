@rem
@rem Copyright 2015 the original author or authors.
@rem
@rem Licensed under the Apache License, Version 2.0 (the "License");
@rem you may not use this file except in compliance with the License.
@rem You may obtain a copy of the License at
@rem
@rem      https://www.apache.org/licenses/LICENSE-2.0
@rem
@rem Unless required by applicable law or agreed to in writing, software
@rem distributed under the License is distributed on an "AS IS" BASIS,
@rem WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
@rem See the License for the specific language governing permissions and
@rem limitations under the License.
@rem

@if "%DEBUG%" == "" @echo off
@rem ##########################################################################
@rem
@rem  pdfGEN startup script for Windows
@rem
@rem ##########################################################################

@rem Set local scope for the variables with windows NT shell
if "%OS%"=="Windows_NT" setlocal

set DIRNAME=%~dp0
if "%DIRNAME%" == "" set DIRNAME=.
set APP_BASE_NAME=%~n0
set APP_HOME=%DIRNAME%..

@rem Resolve any "." and ".." in APP_HOME to make it shorter.
for %%i in ("%APP_HOME%") do set APP_HOME=%%~fi

@rem Add default JVM options here. You can also use JAVA_OPTS and PDF_GEN_OPTS to pass JVM options to this script.
set DEFAULT_JVM_OPTS=

@rem Find java.exe
if defined JAVA_HOME goto findJavaFromJavaHome

set JAVA_EXE=java.exe
%JAVA_EXE% -version >NUL 2>&1
if "%ERRORLEVEL%" == "0" goto execute

echo.
echo ERROR: JAVA_HOME is not set and no 'java' command could be found in your PATH.
echo.
echo Please set the JAVA_HOME variable in your environment to match the
echo location of your Java installation.

goto fail

:findJavaFromJavaHome
set JAVA_HOME=%JAVA_HOME:"=%
set JAVA_EXE=%JAVA_HOME%/bin/java.exe

if exist "%JAVA_EXE%" goto execute

echo.
echo ERROR: JAVA_HOME is set to an invalid directory: %JAVA_HOME%
echo.
echo Please set the JAVA_HOME variable in your environment to match the
echo location of your Java installation.

goto fail

:execute
@rem Setup the command line

set CLASSPATH=%APP_HOME%\lib\gs-gradle-0.1.0.jar;%APP_HOME%\lib\thymeleaf-3.0.11.RELEASE.jar;%APP_HOME%\lib\fop-2.3.jar;%APP_HOME%\lib\pdfbox-2.0.19.jar;%APP_HOME%\lib\assertj-core-3.14.0.jar;%APP_HOME%\lib\junit-4.12.jar;%APP_HOME%\lib\ognl-3.1.12.jar;%APP_HOME%\lib\attoparser-2.0.5.RELEASE.jar;%APP_HOME%\lib\unbescape-1.1.6.RELEASE.jar;%APP_HOME%\lib\slf4j-api-1.7.25.jar;%APP_HOME%\lib\batik-transcoder-1.10.jar;%APP_HOME%\lib\batik-extension-1.10.jar;%APP_HOME%\lib\batik-bridge-1.10.jar;%APP_HOME%\lib\batik-script-1.10.jar;%APP_HOME%\lib\batik-anim-1.10.jar;%APP_HOME%\lib\batik-svg-dom-1.10.jar;%APP_HOME%\lib\batik-gvt-1.10.jar;%APP_HOME%\lib\batik-parser-1.10.jar;%APP_HOME%\lib\batik-svggen-1.10.jar;%APP_HOME%\lib\batik-awt-util-1.10.jar;%APP_HOME%\lib\batik-dom-1.10.jar;%APP_HOME%\lib\batik-css-1.10.jar;%APP_HOME%\lib\xmlgraphics-commons-2.3.jar;%APP_HOME%\lib\batik-ext-1.10.jar;%APP_HOME%\lib\fontbox-2.0.19.jar;%APP_HOME%\lib\commons-logging-1.2.jar;%APP_HOME%\lib\commons-io-1.3.1.jar;%APP_HOME%\lib\avalon-framework-impl-4.3.1.jar;%APP_HOME%\lib\avalon-framework-api-4.3.1.jar;%APP_HOME%\lib\hamcrest-core-1.3.jar;%APP_HOME%\lib\javassist-3.20.0-GA.jar;%APP_HOME%\lib\batik-xml-1.10.jar;%APP_HOME%\lib\batik-util-1.10.jar;%APP_HOME%\lib\xml-apis-ext-1.3.04.jar;%APP_HOME%\lib\xalan-2.7.2.jar;%APP_HOME%\lib\serializer-2.7.2.jar;%APP_HOME%\lib\xml-apis-1.3.04.jar;%APP_HOME%\lib\batik-constants-1.10.jar;%APP_HOME%\lib\batik-i18n-1.10.jar


@rem Execute pdfGEN
"%JAVA_EXE%" %DEFAULT_JVM_OPTS% %JAVA_OPTS% %PDF_GEN_OPTS%  -classpath "%CLASSPATH%" generate.pdf.App %*

:end
@rem End local scope for the variables with windows NT shell
if "%ERRORLEVEL%"=="0" goto mainEnd

:fail
rem Set variable PDF_GEN_EXIT_CONSOLE if you need the _script_ return code instead of
rem the _cmd.exe /c_ return code!
if  not "" == "%PDF_GEN_EXIT_CONSOLE%" exit 1
exit /b 1

:mainEnd
if "%OS%"=="Windows_NT" endlocal

:omega
