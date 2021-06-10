# oraphp - Oracle Php Query Editor by Gaurav Batta
1. Download and Install php <br> 
1. Download and Install Oracle Client 19c <br>
1. In php.ini enable dlls for oracle <br>
`extension=oci8_12c  ; Use with Oracle Database 12c Instant Client` <br>
`extension=oci8_19  ; Use with Oracle Database 19 Instant Client` <br>
3. Make sure extension_dir is pointing to right location. <br>
For e.g. `extension_dir = "c:\users\gbatta\Downloads\php\ext"` <br>
5. To use php as web server use `php -S localhost:port` from the folder location where this repository code is downloaded.
6. On your browser, launch `http://localhost:8080` which implicitly launch index.html from the repository folder.


