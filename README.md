# Teamspeak 3 server manager

### What is it?
Teamspeak 3 server manager is a simple web application built on Laravel to let users manage their own Teamspeak servers. Its currently fairly new and it still needs allot of work. But the basics are working.

### What does it do?
Right now it lets you create, delete and edit servers. You can start, stop and restart them. Edit their configuration. Create and delete tokens. And check how many people are online. All from your own server.

### Requirements
Its built on Laravel 5.1 LTS. So atleast PHP 5.5.9. You also need a webserver. If it isn't local you should make sure your teamspeak server's query port is exposed to the internet. (Recommended is to run it locally)

### Installation
The setup is pretty simple:
- Clone this repo somewhere (Make sure you have git installed, or download the zip)
    `git clone https://github.com/Taronyuu/Teamspeak3-server-manager.git`
- Set the required values in the `.env` file. You can copy them from the `.env.example` file. (Create the `.env` file if it does not exist by copying the `.env.example` file)


    TS_USERNAME=serveradmin
    TS_PASSWORD={Your serveradmin password}
    TS_SERVER_IP=127.0.0.1
    TS_SERVER_PORT=10011

- Run composer install
    `composer install`
- Install a teamspeak server somewhere and start it. Doing this is outside the scope of this readme file.
-   Configure your database in `.env`.
-   Run `php artisan migrate:refresh` to update the sqlite file with the right columns
-   Run `php artisan db:seed` to insert user roles.
-   Run `php artisan teamspeak:reset` to remove all existing Teamspeak servers. This is because at the moment there is no sync option. ***THIS DOES REMOVE ALL EXISTING SERVERS.***
-   Go to `yoururl.com/auth/register` and create a new user.
-   You will have to set it as an admin manually (for the moment) as an Administrator. In `role_user` set the  `role_id` to 1 on your account.
-   Go to `yoururl.com/auth/login`
-   Login
-   Enjoy

### Can you add.... ?
Ofcourse! Please open an issue or send me a message. I'll be more than happy to add features whenever I have time. :)

### Screens
![Admin Overview](https://snapr.pw/i/0eb20f4d96.png "Admin Overview")

![Servers (Admin)](https://snapr.pw/i/d62243c561.png "Servers Admin")

![Support](https://snapr.pw/i/747c316cb8.png "Support")

![Servers (User)](https://snapr.pw/i/97e9685b22.png "Servers User")
