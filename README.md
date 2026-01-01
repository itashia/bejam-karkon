# 🚀 Biabejam - Job Replacement Platform

> **"When you can't go to work, who will work in your place?"**  
> Biabejam is Iran's first job replacement platform. Sick day? Vacation? Emergency? Find a qualified professional to temporarily replace you at work.

**Built with ❤️ by:** [@itashia](https://github.com/itashia)  
**Support the developer:**  
[☕ Buy me a coffee](https://www.coffeebede.com/itashia) • [💝 Donate](https://donito.me/itashia)

---

## 🚀 Quick Start

### **Option 1: One-Command Setup** (Recommended)
```bash
make start
```
This single command will:
- Clean any existing setup
- Build all Docker containers
- Start the entire application stack
- Set proper permissions

### **Option 2: Manual Setup**
```bash
# Start all services
make up

# If app doesn't start automatically:
docker exec -it biabejam_app bash
php artisan serve --port=8000 --host=0.0.0.0
```

---

## 🌐 Access Services

| Service | URL | Credentials |
|---------|-----|-------------|
| **App** | http://localhost:90 | - |
| **pgAdmin** | http://localhost:8080 | email: `itarrshia@biabejam.com`<br>pass: `admin` |
| **MailHog** | http://localhost:8025 | - |
| **MinIO** | http://localhost:9001 | user: `minio`<br>pass: `minio123` |
| **Grafana** | http://localhost:3000 | user: `admin`<br>pass: `admin` |

---

## ⚡ Development Commands

### **Docker Management**
```bash
make up        # Start all services
make down      # Stop all services
make restart   # Restart services
make logs      # View app logs
make app       # SSH into app container
```

### **Artisan & Composer**
```bash
make artisan migrate          # Run migrations
make artisan db:seed          # Seed database
make artisan tinker           # Open Tinker
make composer require package # Install package
```

### **Database**
```bash
make fresh    # Fresh migration + seeding
make test     # Run tests
make clean    # Full clean + rebuild
```

---

## 🏗️ Project Structure

```
biabejam/
├── app/
│   ├── Enums/          # PHP Enums (Gender, Status, etc.)
│   ├── Models/         # Eloquent Models
│   └── Livewire/       # Livewire components
├── database/
│   ├── migrations/     # Database migrations
│   └── seeders/       # Data seeders
├── resources/
│   ├── views/         # Blade templates
│   └── css/js/        # Frontend assets
└── docker/            # Docker configuration
```

---

## 🛠️ Common Issues & Fixes

### **Permission Issues**
```bash
# Fix file permissions
sudo chown -R $(whoami):$(whoami) .
chmod -R 775 storage bootstrap/cache
```

### **Container Won't Start**
```bash
# Rebuild from scratch
make clean
make build
make up
```

### **Port Already in Use**
```bash
# Kill processes on port 90
sudo lsof -ti:90 | xargs kill -9
```

---

## 🤝 Contributing

### **Commit Rules**
```bash
# ALWAYS create a new branch
git checkout -b feature/your-feature-name

# Add and commit
git add .
git commit -m "feat: Add amazing feature

- Added new functionality
- Fixed some bugs
- Improved performance

- درست شده با:@your-github-username"

# Push and create PR
git push origin feature/your-feature-name
```

### **Branch Naming Convention**
- `feature/` - New features
- `fix/` - Bug fixes
- `docs/` - Documentation
- `refactor/` - Code refactoring

**Example:** `feature/add-payment-gateway`

---

## 📦 Tech Stack

- **Backend:** Laravel 11, PHP 8.3
- **Frontend:** Livewire, Alpine.js, Tailwind CSS
- **Database:** PostgreSQL 16
- **Cache:** Redis
- **Queue:** Laravel Horizon
- **Admin:** Filament PHP
- **Container:** Docker Compose
- **Storage:** MinIO (S3 compatible)

---

## 🚨 Emergency Commands

```bash
# Nuke everything and start fresh
make clean && make start

# View real-time logs
docker compose logs -f --tail=100 app

# Check container health
docker compose ps
```

---

## 📞 Need Help?

1. **Check logs:** `make logs`
2. **Restart services:** `make restart`
3. **Ask in Discord/Telegram group**
4. **Create GitHub issue**

---

## 🎯 Quick Checklist

- [ ] `make start` - Everything running?
- [ ] http://localhost:90 - App accessible?
- [ ] Database seeded?
- [ ] Admin panel working? (http://localhost:90/admin)
- [ ] Email catching? (http://localhost:8025)

---

**Happy Coding! 🚀**  
*Remember: Always work on a new branch and include your @username at the end of commits!*

**Built with passion by [@itashia](https://github.com/itashia)**  
[☕ Support](https://www.coffeebede.com/itashia) • [🐛 Report Issues](https://github.com/itashia/biabejam/issues)