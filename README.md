# TurnoverBnB Code Challenge

John is a Airbnb Host. After some months of hosting, John partenered up with a trusted cleaner, Patricia, who worked to always keep John's Airbnb as tidy as possible to his guests.

However, John is not very organized and, sometimes, they have communication problems. Often he would forget to message Patricia to cancel a cleaning, or sometimes he needed to change the time of cleaning and had no good way of contacting Patricia. This resulted in guests arriving in a messy house and, sometimes, in Patricia arriving while guests were still there.

After seeing his Airbnb Rating fall a few points, John decided he had to take action. He hired you to write a simple software that would let him manage his cleanings and better communicate with Patricia.

As the pay was pretty good, you took up the job. The deadline is approaching and there are just a few steps left to finish the project.

## Setting it up

To set the challenge up, start by running `composer install` and `npm install` so the project's dependencies get installed.

Then, create a local MySQL database (the project assumes it's called `turnoverbnb_challenge`, but the name doesn't matter).

Update the `.env` file with your database credentials so the project can access the database.

After that, run the database migrations with `php artisan migrate` to create the database schema and populate it with `php artisan db:seed`.

Then, run `php artisan serve` to start a simple local development server that should be sufficient for the purposes of this challenge.

If needed, you may reset the database with `php artisan migrate:fresh`.

## The Models

A Airbnb Host is a `Host`, while the cleaners they work with are `Cleaner`s.

A `House` is a property rented by an Airbnb Host, and a `CleaningProject` represents a cleaning job for a `Cleaner`.

Each Airbnb `Host` may have many `House`s that they rent. 

Each `House` may have one or more `CleaningProject`s attached to them, and each `CleaningProject` is assigned to a `Cleaner`.

Each `Host` may work with one or more `Cleaner`s that are assigned to one or more of his `House`es.

## Available Users

John's account can be accessed with login `host1@turnoverbnb.com`, and Patricia's account can be accessed with `cleaner1@turnoverbnb.com`

An additional host and cleaner are available at `host2@turnoverbnb.com` and `cleaner2@turnoverbnb.com`.

The password is `secret`.

## The Challenge

The challenge consists of filling in the missing features of the project.

These are:

#### On the host side

 1. Add a new house (with name, address and possibility to attach one or more cleaners to it).
 2. Edit a house (changing the name and the cleaners that are assigned to it).
 3. Delete a house (this should also delete the cleaning projects related to this house).
 4. Connect with a new cleaner (through the cleaner's email).
 5. Delete a cleaner connection (this should also delete the cleaning projects assigned to this cleaner).
 6. Create a cleaning project (specifying the house, the start and end times and to which cleaner it is assigned);
 7. Edit a cleaning project (change the start and end times);
 8. Delete a cleaning project;
 9. A page to see a list of existing cleaning projects;
 10. A page to see the details of a cleaning project;
 
#### On the cleaner side

 1. A page to see the list of cleaning projects;
 2. A page to see the details of a cleaning project;
 
Apply the solution that you think to be the best.

If you see pieces of code that could be improved, feel free to refactor them, leaving a comment explaining why you made the change.

If you feel you have the time to improve your project with new features we didn't ask for, by all means do it, leaving a comment of why you thought that feature was necessary.

## Help

If you need any help, please contact me through felipevfaragao@gmail.com or on Telegram/WhatsApp at +55 (85) 999639090.
