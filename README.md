Perseverance
===============
The leaked source code of Perseverance's Mars rover. :D

Due to the time limit, I didn't spend much time on `CliInterface`, so it's not an approved or production-ready code. Please skip `src/Controller.php` in your reviews.

For figuring out how this code works, please kindly start from `tests/Integration/ControllerTest.php#rover_works`.

Installation
------------

```bash
$ git clone https://github.com/amin3mej/perseverance
$ make install
```

Tests
-----

To run the tests you can use the make commands in the project's root.

```bash
$ make test
// or
$ make test-integration
$ make test-unit
```
