<?php

if (PHP_VERSION_ID >= 80500) {
    error_reporting(error_reporting() & ~E_DEPRECATED);
}

if (!extension_loaded('oci8')) {
    define('OCI_DEFAULT', 0);
    define('OCI_SYSOPER', 4);
    define('OCI_SYSDBA', 2);
    define('OCI_CRED_EXT', 8);
    define('OCI_DESCRIBE_ONLY', 16);
    define('OCI_COMMIT_ON_SUCCESS', 32);
    define('OCI_NO_AUTO_COMMIT', 64);
    define('OCI_EXACT_FETCH', 128);
    define('OCI_SEEK_SET', 0);
    define('OCI_SEEK_CUR', 1);
    define('OCI_SEEK_END', 2);
    define('OCI_LOB_BUFFER_FREE', 1);
    define('SQLT_BFILEE', 114);
    define('SQLT_CFILEE', 115);
    define('SQLT_CLOB', 112);
    define('SQLT_BLOB', 113);
    define('OCI_B_NTY', 108);
    define('OCI_B_BFILE', 114);
    define('OCI_B_CFILE', 115);
    define('OCI_B_CLOB', 112);
    define('OCI_B_BLOB', 113);
    define('OCI_B_ROWID', 104);
    define('OCI_B_CURSOR', 116);
    define('OCI_B_BIN', 23);
    define('OCI_B_INT', 3);
    define('OCI_B_NUM', 2);
    define('OCI_FETCHSTATEMENT_BY_COLUMN', 1);
    define('OCI_FETCHSTATEMENT_BY_ROW', 2);
    define('OCI_ASSOC', 1);
    define('OCI_NUM', 2);
    define('OCI_BOTH', 3);
    define('OCI_RETURN_NULLS', 1);
    define('OCI_RETURN_LOBS', 2);
    define('OCI_DTYPE_FILE', 1);
    define('OCI_DTYPE_LOB', 2);
    define('OCI_DTYPE_ROWID', 3);
    define('OCI_D_FILE', 1);
    define('OCI_D_LOB', 2);
    define('OCI_D_ROWID', 3);
    define('OCI_TEMP_CLOB', 2);
    define('OCI_TEMP_BLOB', 1);
}


/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

/*
|--------------------------------------------------------------------------
| Return The Application
|--------------------------------------------------------------------------
|
| This script returns the application instance. The instance is given to
| the calling script so we can separate the building of the instances
| from the actual running of the application and sending responses.
|
*/

return $app;
