# About

TubeLog helps you showcase your YouTube videos, including unlisted ones, and organize them into custom categories.

Through the YouTube Data API, you can choose which videos to display on the website.

# How to Deploy

- Configure the database in your .env file. 

- Set up your Youtube Data API credentials in the .env file. 
```
YOUTUBE_DATA_API_KEY=
YOUTUBE_PLAYLIST_ID=
```
Currently, TubeLog supports displaying unlisted videos on unlisted playlist. Simply create an unlisted playlist on YouTube and add its playlist ID above.

- Set up your admin account by adding the following to .env:
```
SEED_ADMIN_NAME=
SEED_ADMIN_EMAIL=
SEED_ADMIN_PASSWORD=
```

- Run migration with seed `php artisan migrate --seed`

- Serve the application `php artisan serve` 