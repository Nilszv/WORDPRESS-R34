# WordPress Local Development Setup with Docker

This guide will help you run your WordPress website with the custom theme locally using Docker.

## Prerequisites

Before you begin, make sure you have installed:

- **Docker Desktop**: [Download here](https://www.docker.com/products/docker-desktop/)
  - For Windows: Docker Desktop for Windows
  - For Mac: Docker Desktop for Mac
  - For Linux: Docker Engine + Docker Compose

To verify Docker is installed, run:
```bash
docker --version
docker-compose --version
```

## Quick Start

### 1. Clone the Repository

```bash
git clone <your-repository-url>
cd WORDPRESS-R34
```

### 2. Start WordPress

Run this command in the project root directory:

```bash
docker-compose up -d
```

This will:
- Download WordPress and MySQL images (first time only)
- Start the WordPress site on port 8080
- Start phpMyAdmin on port 8081
- Set up the database automatically

### 3. Access Your Site

After the containers start (wait about 30 seconds), open your browser:

- **WordPress Site**: http://localhost:8080
- **phpMyAdmin** (Database Management): http://localhost:8081

### 4. Complete WordPress Installation

When you first visit http://localhost:8080, you'll see the WordPress installation screen:

1. **Select Language**: Choose your preferred language
2. **Site Setup**:
   - Site Title: `My Custom Theme Site` (or your choice)
   - Username: Choose an admin username
   - Password: Choose a strong password
   - Email: Your email address
   - Search Engine Visibility: Check this box for development
3. Click **Install WordPress**

### 5. Activate Your Custom Theme

After installation:

1. Log in to WordPress admin: http://localhost:8080/wp-admin
2. Go to **Appearance > Themes**
3. Find **Custom Theme** and click **Activate**

## Your Site is Now Live!

Visit http://localhost:8080 to see your website with the custom theme.

## Managing Your WordPress Site

### Stop the Site

To stop the containers without removing them:
```bash
docker-compose stop
```

### Start the Site Again

To restart stopped containers:
```bash
docker-compose start
```

### View Logs

To see what's happening in your containers:
```bash
docker-compose logs -f wordpress
```

### Stop and Remove Containers

To completely stop and remove containers (keeps your data):
```bash
docker-compose down
```

### Complete Reset

To remove everything including database data:
```bash
docker-compose down -v
```
**Warning**: This deletes all your WordPress content!

## Development Workflow

### Making Theme Changes

1. Edit files in `wp-content/themes/custom-theme/`
2. Refresh your browser to see changes
3. CSS/JS changes appear immediately
4. PHP changes appear immediately

### Database Access

**Using phpMyAdmin**:
- URL: http://localhost:8081
- Username: `wordpress`
- Password: `wordpress_pass`

### Installing Plugins

1. Go to http://localhost:8080/wp-admin
2. Navigate to **Plugins > Add New**
3. Search and install plugins as normal

## Configuration Details

### Database Credentials

These are set in `docker-compose.yml`:

- **Database Name**: `wordpress`
- **Username**: `wordpress`
- **Password**: `wordpress_pass`
- **Root Password**: `wordpress_root_pass`

### Ports

- **8080**: WordPress site
- **8081**: phpMyAdmin

If these ports are already in use, you can change them in `docker-compose.yml`:
```yaml
ports:
  - "8080:80"  # Change 8080 to another port like 9000
```

## Troubleshooting

### Port Already in Use

If you get an error about port 8080 being in use:

1. Stop any other services using that port
2. Or change the port in `docker-compose.yml`
3. Restart: `docker-compose down && docker-compose up -d`

### Can't Connect to Database

If WordPress can't connect to the database:

1. Wait 30 seconds for MySQL to fully start
2. Check containers are running: `docker-compose ps`
3. Restart: `docker-compose restart`

### Containers Won't Start

1. Make sure Docker Desktop is running
2. Check for errors: `docker-compose logs`
3. Try: `docker-compose down && docker-compose up -d`

### WordPress Shows Installation Screen Again

This happens if you removed volumes. Your data is in Docker volumes:
```bash
docker volume ls | grep wordpress
```

## Backup Your Work

### Export Database

1. Go to http://localhost:8081 (phpMyAdmin)
2. Click on `wordpress` database
3. Click **Export** tab
4. Click **Go** to download

### Backup Uploads

Your uploads are in a Docker volume. To back them up:
```bash
docker cp wordpress_site:/var/www/html/wp-content/uploads ./backup-uploads
```

## Production Deployment

This Docker setup is for **local development only**. For production:

### Option 1: Traditional WordPress Hosting

1. Choose a hosting provider (Bluehost, SiteGround, etc.)
2. Upload theme via FTP or hosting control panel
3. Activate theme in WordPress admin

### Option 2: Cloud Hosting

- **AWS**: Use Amazon Lightsail or EC2
- **Google Cloud**: Use Cloud Run or Compute Engine
- **DigitalOcean**: Use App Platform or Droplets
- **Heroku**: Use Heroku with WordPress buildpack

### Option 3: Free WordPress Hosting

For testing purposes:
- **InfinityFree**: Free with limitations
- **000webhost**: Free tier available
- **WordPress.com**: Free tier (limited theme support)

## Additional Resources

- [WordPress Codex](https://codex.wordpress.org/)
- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [Docker Documentation](https://docs.docker.com/)
- [Docker Compose Documentation](https://docs.docker.com/compose/)

## Next Steps

1. Customize your theme in `wp-content/themes/custom-theme/`
2. Add content (posts, pages, images)
3. Install useful plugins
4. Test responsive design
5. Optimize for production

---

**Happy WordPress Development!** 🚀
