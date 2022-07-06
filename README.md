
## CSV Importer

A basic application made with laravel, which receives a JSON request via API and stores it in the database.
When executing the `php artisan export-to-csv` command, a job will be scheduled.
After running the `php artisan queue:work` command, the job is executed, its function saves all data received from the database in a CSV file.

Some rules:
- All attributes received from JSON files must be in CSV file
- CSV file must have header and semicolon as separator
- Implementation must have unit tests
- Errors must be logged

## Endpoints
`GET api/users`, which obviously lists users

`POST api/users/store`, Receive the data and save it to the database
