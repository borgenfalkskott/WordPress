# WordPress + Bedrock + Docker

A nice local dev env using [WordPress](https://wordpress.org/), [Roots/Bedrock](https://roots.io/bedrock/) and [Docker](https://www.docker.com/).  
Making it easy to version control and maintain your next wp theme or plugin.

You need [Docker Desktop](https://www.docker.com/get-started) and [Composer](https://getcomposer.org/download/) installed to use this setup.

### Getting started

1. Start by cloning this repo: `git clone git@github.com:borgenfalkskott/WordPress.git your-folder`, and move into the folder: `cd your-folder`.

2. Then simply delete the `/.git` folder by typing `rm -R .git`. After this you can setup your own versioning with `git init` and push it to your own repo.

3. Rename the container names in `docker-compose.yml`, if you want to.

4. Go to the `/bedrock` folder and make a copy of `.env.example`, name it `.env` and enter your credentials. You can keep most of what's in there already for your dev environment. **Important!** Do not version control your `.env` file, only the `.env.example` file.

5. Generate your salts at [https://roots.io/salts.html](https://roots.io/salts.html) and paste them in env format, into your `.env` file. Also, if you are using the ACF Pro plugin, enter your license key in `ACF_PRO_KEY=''`.

6. Run `composer update` in the `/bedrock` folder.  
   **Note:** If you are NOT using ACF Pro, simply remove this dependency from `composer.json`, both under `repositories` and under `require`.

7. Open a new tab in your terminal at the root of the project and start the local dev env: `docker compose up`

8. Install WordPress by going to http://localhost:8080

9. Open a new tab in your terminal and shut down: `docker compose down`

### End points

Login page: [http://localhost:8080/wp/wp-login.php](http://localhost:8080/wp/wp-login.php)

Wp admin: [http://localhost:8080/wp/wp-admin/](http://localhost:8080/wp/wp-admin/)

### Credits

❤️ Big thanks to [@Jitesoft](https://github.com/jitesoft) for their contribution with the Docker part of this setup.
