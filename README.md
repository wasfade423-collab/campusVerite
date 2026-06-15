# CampusVérité 🎓

**Votre espace académique 100% anonyme pour exprimer la vérité.**

CampusVérité est une plateforme web innovante permettant aux étudiants et membres de la communauté universitaire de partager leurs avis, suggestions et préoccupations de manière **totalement anonyme** et sécurisée.

---

## 🎯 Fonctionnalités principales

✨ **100% Anonyme**
- Zéro collecte de données personnelles
- Aucun email ou identifiant requis
- Adresse IP non stockée
- Garantie d'anonymat absolue

💬 **Discussions Vivantes**
- Publiez des avis et des retours
- Réagissez et commentez anonymement
- Votez pour les avis utiles
- Système de signalement pour modérer

🎯 **Organisation Intelligente**
- Catégories personnalisables (Pédagogie, Infrastructure, Administration, Équipements)
- Filtrage par type (Coups de Gueule vs Suggestions)
- Recherche et tri avancés
- Interface intuitive et moderne

🔐 **Sécurité & Conformité**
- RGPD compliant
- Données anonymisées
- Système de modération robuste
- Protégé contre les abus

---

## 📋 Table des matières

- [Installation](#installation)
- [Configuration](#configuration)
- [Structure du projet](#structure-du-projet)
- [Utilisation](#utilisation)
- [Architecture](#architecture)
- [Modération](#modération)
- [Contribution](#contribution)
- [Licence](#licence)

---

## 🚀 Installation

### Prérequis

- PHP 7.4+
- MySQL 5.7+
- Serveur web (Apache/Nginx)
- Composer (optionnel)

### Étapes d'installation

1. **Clonez le repository**
   ```bash
   git clone https://github.com/votre-username/campus-verite.git
   cd campus-verite
   ```

2. **Créez la base de données**
   ```bash
   mysql -u root -p < database.sql
   ```

3. **Configurez les variables d'environnement**
   ```bash
   cp .env.example .env
   # Éditez .env avec vos paramètres
   ```

4. **Donnez les permissions appropriées**
   ```bash
   chmod 755 app/
   chmod 644 app/config/.env
   ```

5. **Accédez à l'application**
   ```
   http://localhost/vibe1
   ```

---

## ⚙️ Configuration

### Variables d'environnement (.env)

```env
# Base de données
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=your_password
DB_NAME=campus_verite

# Serveur
APP_URL=http://localhost/vibe1
APP_ENV=development

# Sécurité
SESSION_TIMEOUT=3600
CSRF_TOKEN_ENABLED=true
```

### Structure des dossiers

```
campus-verite/
├── app/                      # Logique applicative (MVC)
│   ├── Controllers/          # Traitement des requêtes
│   │   ├── AuthController.php
│   │   ├── FeedbackController.php
│   │   └── AdminController.php
│   ├── Models/               # Interactions avec la BDD
│   │   ├── User.php
│   │   ├── Feedback.php
│   │   └── Comment.php
│   ├── Views/                # Templates d'affichage
│   │   ├── auth/
│   │   ├── feedbacks/
│   │   └── layout/
│   └── Config/               # Configuration
│       └── Database.php
│
├── public/                   # Dossier public (seul accès web)
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── index.php             # Point d'entrée unique
│
├── .env                      # Variables secrètes
├── .gitignore                # Fichiers à ignorer
└── README.md                 # Ce fichier
```

---

## 📖 Utilisation

### Pour les utilisateurs

#### 1️⃣ **Consulter le fil d'actualité**
- Accédez à la page "Fil d'avis"
- Filtrez par catégorie ou type
- Consultez les avis anonymes de la communauté

#### 2️⃣ **Publier un avis**
- Cliquez sur "Publier un Avis Anonyme"
- Sélectionnez une catégorie
- Choisissez le type : Coup de Gueule ou Suggestion
- Rédigez votre message de façon constructive
- Soumettez (aucune donnée personnelle collectée)

#### 3️⃣ **Réagir et discuter**
- Votez pour les avis utiles
- Publiez des commentaires anonymes
- Signalez les abus ou contenus inappropriés

### Pour les modérateurs

#### Accès Admin
1. Allez sur `/index.php?action=login`
2. Connectez-vous avec vos identifiants
3. Accédez au dashboard de modération

#### Rôle des modérateurs
- ✓ Examiner et valider les avis
- ✓ Supprimer les contenus inappropriés
- ✓ Gérer les signalements
- ✓ Consulter les statistiques

---

## 🏗️ Architecture

### Pattern MVC

CampusVérité suit le pattern **Model-View-Controller** :

- **Models** : Requêtes SQL et logique métier
- **Controllers** : Traitement des requêtes et gestion du flux
- **Views** : Templates HTML/PHP d'affichage

### Flux des requêtes

```
index.php (Front Controller)
    ↓
Router → Détecte l'action
    ↓
Controller → Logique métier
    ↓
Model → Requête SQL
    ↓
View → Template rendu
```

### Sécurité

- **Protection XSS** : `htmlspecialchars()` sur tous les output
- **Protection SQL Injection** : Requêtes préparées avec PDO
- **CSRF Protection** : Tokens de session
- **Anonymat** : Zéro traçage IP

---

## 🛡️ Modération

### Types de signalements

| Type | Action |
|------|--------|
| 🔞 Contenu inapproprié | Masquage rapide |
| 🚨 Harcèlement | Suppression + Ban |
| 💬 Spam | Suppression |
| 📋 Doublon | Fusion |

### Processus de modération

1. **Détection** : Signalements utilisateurs ou système
2. **Révision** : Examen par modérateur
3. **Action** : Suppression, masquage ou approbation
4. **Documentation** : Historique des actions

---

## 📊 Bases de données

### Tables principales

#### `users`
```sql
- id (PK)
- email (unique)
- password (hashed)
- role (user/admin)
- created_at
```

#### `feedbacks`
```sql
- id (PK)
- content
- category
- type (Coup de Gueule / Suggestion)
- votes
- status (approved/pending/rejected)
- created_at
```

#### `comments`
```sql
- id (PK)
- feedback_id (FK)
- content
- created_at
```

#### `reports`
```sql
- id (PK)
- feedback_id (FK)
- reason
- status (pending/resolved)
- created_at
```

---

## 🎨 Design & UX

### Technologies utilisées

- **Frontend** : Tailwind CSS + HTML5
- **Backend** : PHP 7.4+
- **Base de données** : MySQL
- **Animations** : CSS personnalisé

### Palette de couleurs

| Couleur | Usage |
|---------|-------|
| 🟢 Émeraude (#059669) | Primaire, CTA |
| ⚫ Gris (#1f2937) | Texte, Secondaire |
| 🔴 Rouge (#dc2626) | Coups de Gueule |
| 🟠 Ambre (#d97706) | Suggestions |
| 🔵 Bleu (#3b82f6) | Informations |

### Points clés du design

✓ Interface épurée et moderne
✓ Responsive design (mobile-first)
✓ Accessibilité maximale
✓ Animations fluides et subtiles
✓ Dark mode (optional)

---

## 🔧 Développement

### Installation pour développeurs

```bash
# Clonez le repo
git clone https://github.com/votre-username/campus-verite.git

# Installez les dépendances (si composer.json existe)
composer install

# Configurez votre environnement
cp .env.example .env
nano .env

# Démarrez le serveur local
php -S localhost:8000
```

### Commandes utiles

```bash
# Vérifier les erreurs PHP
php -l app/controllers/MyController.php

# Tester la connexion BDD
php app/config/database.php
```

### Standards de code

- **PHP** : PSR-12
- **HTML** : Sémantique HTML5
- **CSS** : BEM naming + Tailwind
- **Variables** : Snake_case (PHP), camelCase (JS)

---

## 🐛 Signaler un bug

Trouvez-vous un bug ? Créez une issue sur GitHub :

1. Décrivez le problème clairement
2. Incluez les étapes pour reproduire
3. Spécifiez votre navigateur/OS
4. Attachez des captures d'écran si pertinent

---

## 🤝 Contribution

Les contributions sont bienvenues ! 

### Comment contribuer

1. **Fork** le repository
2. **Créez une branche** : `git checkout -b feature/ma-feature`
3. **Committez vos changements** : `git commit -m "Ajout de ma feature"`
4. **Poussez vers votre fork** : `git push origin feature/ma-feature`
5. **Créez une Pull Request**

### Guidelines

- Commentez votre code
- Testez vos modifications
- Respectez les standards de code
- Incluez une description claire dans les PRs

---

## 📝 Changelog

### v1.0.0 (2026-06-15)
- ✅ Lancement initial
- ✅ Système de feedback anonyme
- ✅ Modération admin
- ✅ Design moderne et responsive
- ✅ RGPD compliant

### v1.1.0 (À venir)
- 🔄 API REST publique
- 🔄 Dashboard analytique
- 🔄 Export de données
- 🔄 Intégration email

---

## 📄 Licence

Ce projet est sous licence [MIT](LICENSE).

---

## 👥 Auteurs & Crédits

**Développé avec ❤️ pour la transparence universitaire**

- Design UI/UX : [Équipe Design]
- Backend : [Développeurs]
- Modération : [Community Team]

---

## 📞 Support & Contact

- 📧 **Email** : support@campusverite.fr
- 🐛 **Issues** : [GitHub Issues](https://github.com/votre-username/campus-verite/issues)
- 💬 **Discussions** : [GitHub Discussions](https://github.com/votre-username/campus-verite/discussions)
- 📚 **FAQ** : [Wiki](https://github.com/votre-username/campus-verite/wiki)

---

## ⚖️ Mentions légales

**Conditions d'utilisation**

En utilisant CampusVérité, vous acceptez :

- ✓ Notre [Politique de confidentialité](PRIVACY.md)
- ✓ Nos [Conditions d'utilisation](TERMS.md)
- ✓ Notre [Code de conduite](CODE_OF_CONDUCT.md)

**Respect des règles**

Les utilisateurs s'engagent à :
- Ne pas publier de contenu offensant ou discriminatoire
- Respecter la vie privée d'autrui
- Ne pas spammer ou abuser du système
- Accepter les décisions de modération

---

## 🎯 Roadmap

- [x] MVP - Plateforme de feedback anonyme
- [ ] Phase 2 - API publique + Webhooks
- [ ] Phase 3 - Dashboard analytique
- [ ] Phase 4 - Intégrations tierces
- [ ] Phase 5 - Version mobile native

---

**Merci d'utiliser CampusVérité ! Votre voix compte. 🎓**

---

<div align="center">

Made with ❤️ for University Transparency

[⬆ Back to top](#campusvérité-)

</div>