<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Plateforme Notariale</title>
    <style>
        body { background: #f9f9f9; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; color: #222; }
        header { background: #0088cc; color: #fff; padding: 1.5rem 0 0.5rem 0; text-align: center; }
        nav ul { display: flex; justify-content: center; gap: 2rem; list-style: none; padding: 0; margin: 0; }
        nav a { color: #fff; text-decoration: none; font-weight: 500; font-size: 1.1rem; }
        nav a:hover { text-decoration: underline; }
        .hero {
            background: linear-gradient(rgba(0,0,0,0.45),rgba(0,0,0,0.45)), url('https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 4rem 0 3rem 0;
            text-align: center;
        }
        .hero h1 { font-size: 2.5rem; margin-bottom: 1rem; }
        .hero p { font-size: 1.2rem; margin-bottom: 2rem; }
        .btn {
            background: #ff6600;
            color: #fff;
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background 0.2s;
            cursor: pointer;
        }
        .btn:hover { background: #e65c00; }
        section#services { max-width: 1100px; margin: 3rem auto; }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
        }
        .service-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .service-card:hover { transform: translateY(-7px); }
        .service-img img { width: 100%; height: 160px; object-fit: cover; }
        .service-content { padding: 1.2rem; }
        .service-content h3 { color: #0088cc; margin-bottom: 0.5rem; }
        /* Formulaire */
        .appointment-section {
            background: #fff;
            max-width: 400px;
            margin: 3rem auto 2rem auto;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.13);
            padding: 2rem 1.5rem 1.5rem 1.5rem;
            position: relative;
        }
        .appointment-section h2 { color: #0088cc; text-align: center; margin-bottom: 1.2rem; }
        .appointment-section label { font-weight: 500; color: #0088cc; }
        .appointment-section input,
        .appointment-section select {
            width: 100%;
            padding: 0.6rem 1rem;
            margin-top: 0.3rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 1px solid #d0d0d0;
            background: #f8fafd;
            font-size: 1rem;
            transition: border-color 0.2s;
        }
        .appointment-section input:focus,
        .appointment-section select:focus {
            border-color: #0088cc;
            outline: none;
        }
        .appointment-section button {
            width: 100%;
            background: #0088cc;
            color: #fff;
            font-weight: bold;
            padding: 0.8rem 0;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            margin-top: 0.5rem;
            transition: background 0.2s, transform 0.2s;
            cursor: pointer;
        }
        .appointment-section button:hover { background: #005f8c; transform: scale(1.03);}
        footer { background: #222; color: #fff; text-align: center; padding: 2rem 0 1rem 0; margin-top: 3rem; }
        @media (max-width: 700px) {
            .services-grid { grid-template-columns: 1fr; }
            .appointment-section { padding: 1rem; }
        }
    </style>
</head>
<body>
    <header>
        <h2>Plateforme Notariale</h2>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#rendezvous">Prendre RDV</a></li>
                <li><a href="#">Connexion</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <h1>Bienvenue sur votre espace notarial</h1>
        <p>Organisez vos rendez-vous, accédez à des services juridiques et bénéficiez d’un accompagnement professionnel et sécurisé.</p>
        <a href="#rendezvous" class="btn">Prendre rendez-vous</a>
    </section>
    <section id="services">
        <h2 class="section-title" style="text-align:center;color:#0088cc;margin-bottom:2rem;">Nos Services</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80" alt="Rédaction d’actes">
                </div>
                <div class="service-content">
                    <h3>Rédaction d’actes</h3>
                    <p>Contrats, testaments, donations, ventes immobilières et autres actes notariés.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=600&q=80" alt="Conseils juridiques">
                </div>
                <div class="service-content">
                    <h3>Conseils juridiques</h3>
                    <p>Accompagnement personnalisé sur les implications juridiques et fiscales de vos démarches.</p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-img">
                    <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80" alt="Achat et vente immobilière">
                </div>
                <div class="service-content">
                    <h3>Achat et vente immobilière</h3>
                    <p>Vérification de titres, actes de vente, hypothèques et accompagnement complet.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="rendezvous" class="appointment-section">
        <h2>Prendre un Rendez-vous</h2>
        <form method="POST" action="{{ route('rendezvous.store') }}">
            @csrf
            <label for="fullname">Nom complet</label>
            <input type="text" id="fullname" name="fullname" required>
            <label for="phone">Téléphone</label>
            <input type="tel" id="phone" name="phone" required>
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" required>
            <label for="date">Date souhaitée</label>
            <input type="date" id="date" name="date" required>
            <label for="type_acte">Type de rendez-vous</label>
            <select id="type_acte" name="type_acte" required>
                <option value="">-- Sélectionner --</option>
                <option value="Vente immobilière">Vente immobilière</option>
                <option value="Mariage">Mariage</option>
                <option value="Donations">Donations</option>
                <option value="Succession">Succession</option>
                <option value="Conseil juridique">Conseil juridique</option>
            </select>
            <button type="submit">Valider la demande</button>
        </form>
    </section>
    <footer id="contact">
        <p>&copy; 2025 Plateforme Notariale. Tous droits réservés.</p>
        <p>Contact : info@notaria.rw | Kigali, Rwanda</p>
    </footer>
</body>
</html>

