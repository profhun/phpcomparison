#PHP Template Engine Benchmark and Comparsion
##Benchmark today template engines

This benchmark tests the speed and memory consumption of PHP template engines. You can fork the project and contribute by adding your favorite template engine.

##How to run the benchmark

1. Add your database login details to the `config/db.php` file (make sure the user has permission to create tables).
2. Run the `test.php?reset` from your browser.
3. View and compare results by visiting `index.php`.
4. To add more engines to the test, upload the engine to the `template_engines` folder and re-create tests.


forked from rainphp/phpcomparison

##Release notes:
- Fixed bugs in original code
- remove test types
- complex test with loop, include, if/else
- improve benchmark numbers
- save test output data for debug
- implement Smarty
- implement Laravel Blade
- implement phppe2 (for fun)
- implement twig1.15.1
- implement dwoo2
- todo: implement template lite 2
- todo: implement phppe3


