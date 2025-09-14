<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plateforme Notariale</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

       /* Variables */
        :root {
            --primary-color: #0088cc;
            --secondary-color: #00aaff;
            --accent-color: #ff6600;
            --dark-color: #333333;
            --light-color: #f5f5f5;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        /* Global Styles */
        body {
            background-color: #f9f9f9;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .logo span {
            color: var(--accent-color);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 1.5rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: var(--accent-color);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(32, 24, 24, 0.7)), url('https://images.unsplash.com/photo-1593115057322-e94b77572f20?q=80&w=2071&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 5rem 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        .btn {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #e65c00;
        }

        /* Delivery Calculator */
        .calculator {
            background-color: white;
            padding: 3rem 0;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            margin: 2rem 0;
            border-radius: 8px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--primary-color);
        }

        .calculator-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        select, input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
        }

        .checkbox-group input {
            width: auto;
            margin-right: 0.5rem;
        }

        .result {
            background-color: var(--light-color);
            padding: 1.5rem;
            border-radius: 5px;
            margin-top: 1.5rem;
            text-align: center;
            display: none;
        }

        .result.show {
            display: block;
        }

        .price {
            font-size: 1.8rem;
            font-weight: bold;
            color: var(--primary-color);
            margin: 0.5rem 0;
        }

        /* Services Section */
        .services {
            padding: 3rem 0;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .service-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-img {
            height: 200px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-content {
            padding: 1.5rem;
        }

        .service-content h3 {
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 3rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-col h3 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 0.8rem;
        }

        .footer-col ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-col ul li a:hover {
            color: var(--accent-color);
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
        }

        .copyright {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid #444;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                margin-top: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        @media (max-width: 900px) {
            .services-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
        @media (max-width: 600px) {
            .services-grid {
                grid-template-columns: 1fr;
            }
        }
        /* Amélioration formulaire */
        .calculator-form input, .calculator-form select {
            background: #f8fafd;
            border-radius: 8px;
            border: 1.5px solid #d0d0d0;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .calculator-form input:focus, .calculator-form select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px #0088cc33;
            outline: none;
        }
        .calculator-form button.btn {
            font-size: 1.1rem;
            padding: 0.7rem 0;
            border-radius: 10px;
            margin-top: 0.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            transition: background 0.2s, transform 0.2s;
        }
        .calculator-form button.btn:hover {
            background: #005fa3;
            transform: scale(1.04);
        }
        .section-title {
            font-size: 2rem;
            letter-spacing: 1px;
        }
        /* Floating Labels & Animation */
.styled-form .form-group {
    position: relative;
    margin-bottom: 2rem;
}
.styled-form .form-group input,
.styled-form .form-group select {
    width: 100%;
    padding: 1rem 0.75rem;
    border: 1.5px solid #ccc;
    border-radius: 8px;
    background: #fdfdfd;
    font-size: 1rem;
    transition: all 0.3s ease;
}
.styled-form .form-group input:focus,
.styled-form .form-group select:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px #0088cc33;
    outline: none;
}

.floating-label label {
    position: absolute;
    left: 0.85rem;
    top: 1rem;
    background: white;
    color: #888;
    padding: 0 0.3rem;
    transition: all 0.3s ease;
    pointer-events: none;
}
.floating-label input:focus + label,
.floating-label input:not(:placeholder-shown) + label,
.floating-label select:focus + label,
.floating-label select:not([value=""]) + label {
    top: -0.6rem;
    left: 0.75rem;
    font-size: 0.85rem;
    background: white;
    color: var(--primary-color);
}

/* Submit Button Enhanced */
.submit-btn {
    display: block;
    width: 100%;
    padding: 0.9rem;
    font-size: 1.1rem;
    font-weight: bold;
    color: white;
    background: var(--accent-color);
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.submit-btn:hover {
    background: #e65c00;
    transform: translateY(-2px) scale(1.02);
}
    /* Animation fade-slide */
@keyframes fadeSlideUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
:root {
  --primary-color: #0088cc;
  --accent-color: #ff6600;
}

.contact-section {
  background: #f9f9f9;
  padding: 4rem 1rem;
  display: flex;
  justify-content: center;
  align-items: center;
}

.contact-container {
  background: #fff;
  padding: 3rem 2rem;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
  max-width: 700px;
  width: 100%;
  animation: fadeSlideUp 0.8s ease-out;
}

.contact-title {
  font-size: 2rem;
  text-align: center;
  margin-bottom: 2rem;
  color: var(--primary-color);
}

.contact-form {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.input-box {
  position: relative;
  width: 100%;
}

.input-box input,
.input-box select {
  width: 100%;
  padding: 1rem 0.75rem;
  font-size: 1rem;
  background: #fdfdfd;
  border: 1.5px solid #ccc;
  border-radius: 8px;
  outline: none;
  transition: 0.3s;
}

.input-box select {
  appearance: none;
}

.input-box input:focus,
.input-box select:focus {
  border-color: var(--primary-color);
  box-shadow: 0 0 0 3px #0088cc33;
}

.input-box label {
  position: absolute;
  top: 1rem;
  left: 0.85rem;
  background: white;
  padding: 0 0.3rem;
  color: #888;
  pointer-events: none;
  transition: all 0.3s ease;
}

.input-box input:focus + label,
.input-box input:not(:placeholder-shown) + label,
.input-box select:focus + label,
.input-box select:not([value=""]) + label {
  top: -0.6rem;
  left: 0.7rem;
  font-size: 0.85rem;
  color: var(--primary-color);
}

.form-row {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
}

.contact-btn {
  padding: 1rem;
  font-size: 1.1rem;
  background: var(--accent-color);
  color: white;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  font-weight: bold;
  transition: background 0.3s ease, transform 0.2s ease;
}

.contact-btn:hover {
  background: #e65c00;
  transform: scale(1.03);
}

/* Flash message */
.flash {
  padding: 1rem;
  margin-bottom: 1rem;
  border-radius: 8px;
  font-weight: bold;
  text-align: center;
}
.flash.success {
  background: #d4edda;
  color: #155724;
}
.flash.error {
  background: #f8d7da;
  color: #721c24;
}

/* Animation */
@keyframes fadeSlideUp {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 600px) {
  .form-row {
    flex-direction: column;
    gap: 0;
  }
}

.styled-form {
    animation: fadeSlideUp 0.8s ease-out both;
    animation-delay: 0.2s;
}
 html {
            scroll-behavior: smooth;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        /* Bouton retour haut */
        #scrollTopBtn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            display: none;
        }
        #scrollTopBtn:hover {
            background: var(--accent-color);
        }
        /* Loader */
        #loader {
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 6px solid #ccc;
            border-top-color: var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .hero .btn {
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        .service-card {
    background-color: white;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    transition: transform 0.3s;
    animation: fadeSlideUp 0.8s ease forwards;
    opacity: 0; /* On part invisible */
}

/* Ajouter un délai d’apparition pour chaque carte */
.service-card:nth-child(1) {
    animation-delay: 0.1s;
}
.service-card:nth-child(2) {
    animation-delay: 0.2s;
}
.service-card:nth-child(3) {
    animation-delay: 0.3s;
}
.service-card:nth-child(4) {
    animation-delay: 0.4s;
}
.service-card:nth-child(5) {
    animation-delay: 0.5s;
}
.service-card:nth-child(6) {
    animation-delay: 0.6s;
}
        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-img {
            height: 200px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .service-card:hover .service-img img {
            transform: scale(1.05);
        }

        .service-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

        .service-content {
            padding: 1.5rem;
        }

        .service-content h3 {
            margin-bottom: 0.5rem;
            color: var(--primary-color);
            font-size: 1.4rem;
        }

        .service-content p {
            color: #555;
            font-size: 0.95rem;
        }

        .service-card {
  transition: transform 0.3s ease;
}
.service-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
<style>
  .font-playfair { font-family: 'Playfair Display', serif; }
  @keyframes blink-caret { 50% { border-color: transparent; } 100% { border-color: currentColor; } }
  .animate-caret { animation: blink-caret 1s step-end infinite; border-right-width: 4px; }
  @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
  .fade-in { animation: fadeIn 1s ease forwards; }
  .fade-in.slide-up { animation: fadeInSlideUp 1s ease forwards; }
  @keyframes fadeInSlideUp { 0% {opacity: 0; transform: translateY(20px);} 100% {opacity: 1; transform: translateY(0);} }
  .text-nom { font-weight: 900; font-style: italic; }

  #typing { text-shadow: 2px 2px 6px rgba(0,0,0,0.1); transition: transform 0.3s ease; }
  #typing:hover { transform: scale(1.05); cursor: default; }

  .bubbles div {
    position: absolute;
    bottom: -100px;
    width: 20px;
    height: 20px;
    background: rgba(59,130,246,0.3);
    border-radius: 50%;
    animation: bubble 20s infinite;
    opacity: 0.6;
  }
  .bubbles div:nth-child(1) { left: 10%; animation-delay: 0s; }
  .bubbles div:nth-child(2) { left: 20%; animation-delay: 2s; width: 25px; height: 25px; }
  .bubbles div:nth-child(3) { left: 30%; animation-delay: 4s; }
  .bubbles div:nth-child(4) { left: 40%; animation-delay: 1s; width: 30px; height: 30px; }
  .bubbles div:nth-child(5) { left: 50%; animation-delay: 3s; }
  .bubbles div:nth-child(6) { left: 60%; animation-delay: 6s; width: 22px; height: 22px; }
  .bubbles div:nth-child(7) { left: 70%; animation-delay: 5s; }
  .bubbles div:nth-child(8) { left: 80%; animation-delay: 7s; width: 18px; height: 18px; }
  .bubbles div:nth-child(9) { left: 90%; animation-delay: 3s; width: 28px; height: 28px; }
  .bubbles div:nth-child(10) { left: 95%; animation-delay: 8s; width: 20px; height: 20px; }

  @keyframes bubble {
    0% { transform: translateY(0) scale(1); opacity: 0.7; }
    50% { transform: translateY(-400px) scale(1.2); }
    100% { transform: translateY(-800px) scale(1.5); opacity: 0; }
  }

  .stars, .stars2 {
    position: absolute;
    width: 200%;
    height: 200%;
    background-repeat: repeat;
    background-size: 100px 100px;
    z-index: 0;
  }
  .stars { background-image: radial-gradient(white 1px, transparent 1px); animation: starMove 100s linear infinite; opacity: 0.2; }
  .stars2 { background-image: radial-gradient(#ffffff 1px, transparent 1px); animation: starMove 120s linear infinite reverse; opacity: 0.1; }

  @keyframes starMove { from { transform: translate(0, 0); } to { transform: translate(-500px, -500px); } }

  #btn-rdv:hover {
    box-shadow: 0 0 12px 3px rgba(99, 102, 241, 0.75);
    animation: vibrate 0.3s linear infinite;
  }
  @keyframes vibrate {
    0% { transform: translate(0); }
    20% { transform: translate(-1px, 1px); }
    40% { transform: translate(-1px, -1px); }
    60% { transform: translate(1px, 1px); }
    80% { transform: translate(1px, -1px); }
    100% { transform: translate(0); }
  }

  @media (prefers-color-scheme: dark) {
    section.hero {
      background: #1a202c;
      color: #e2e8f0;
    }
    section.hero .container {
      background: rgba(30, 41, 59, 0.9);
    }
    section.hero #typing {
      border-right-color: #a78bfa;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
    }
    section.hero #btn-rdv:hover {
      box-shadow: 0 0 12px 3px rgba(167, 139, 250, 0.75);
    }
    section.hero .bubbles div {
      background: rgba(167, 139, 250, 0.3);
    }
    section.hero .stars { opacity: 0.4; }
    section.hero .stars2 { opacity: 0.2; }
  }
</style>



    
    </style>
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo">Plateforme<span>Notariale</span></div>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#rendezvous">Prendre RDV</a></li>
                    @auth
                        <li><a href="{{ route('dashboard') }}">Tableau de bord</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:none;border:none;color:white;cursor:pointer;">
                                    Déconnexion
                                </button>
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}">Connexion</a></li>
                    @endauth
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
<!-- Import Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

<section class="hero relative bg-gradient-to-br from-indigo-50 via-indigo-100 to-white py-24 text-center overflow-hidden" style="font-family: 'Roboto', sans-serif;">
  <div class="absolute inset-0 overflow-hidden z-0">
    <div class="stars"></div>
    <div class="stars2"></div>
  </div>

  <div class="bubbles">
    <div></div><div></div><div></div><div></div><div></div>
    <div></div><div></div><div></div><div></div><div></div>
  </div>

  <div class="container mx-auto max-w-2xl px-6 relative z-10 bg-white bg-opacity-90 rounded-xl shadow-lg p-10">
    <h1 id="typing" class="text-4xl sm:text-6xl font-playfair font-extrabold mb-8 inline-block border-r-4 animate-caret min-h-[4rem] whitespace-nowrap overflow-hidden drop-shadow-lg opacity-0"></h1>

    <p class="text-lg text-gray-700 mb-12 leading-relaxed max-w-xl mx-auto opacity-0" id="subtitle">
      Simplifiez vos démarches notariales grâce à une prise de rendez-vous rapide,  
      un accompagnement <span class="text-indigo-700 font-semibold">personnalisé</span>,  
      et des <span class="text-indigo-500 font-semibold">services juridiques</span> adaptés à vos besoins.
    </p>

    <a href="#rendezvous" class="inline-block text-white font-semibold py-3 px-12 rounded-full shadow-lg transition-transform duration-300 transform hover:scale-105 opacity-0" id="btn-rdv">
      🗕️ Prendre rendez-vous
    </a>
  </div>
</section>

<style>
  .font-playfair { font-family: 'Playfair Display', serif; }
  @keyframes blink-caret { 50% { border-color: transparent; } 100% { border-color: currentColor; } }
  .animate-caret { animation: blink-caret 1s step-end infinite; border-right-width: 4px; }
  @keyframes fadeIn { from {opacity: 0;} to {opacity: 1;} }
  .fade-in { animation: fadeIn 1s ease forwards; }
  .fade-in.slide-up { animation: fadeInSlideUp 1s ease forwards; }
  @keyframes fadeInSlideUp { 0% {opacity: 0; transform: translateY(20px);} 100% {opacity: 1; transform: translateY(0);} }
  .text-nom { font-weight: 900; font-style: italic; }

  #typing { text-shadow: 2px 2px 6px rgba(0,0,0,0.1); transition: transform 0.3s ease; }
  #typing:hover { transform: scale(1.05); cursor: default; }

  .bubbles div {
    position: absolute;
    bottom: -100px;
    width: 20px;
    height: 20px;
    background: rgba(59,130,246,0.3);
    border-radius: 50%;
    animation: bubble 20s infinite;
    opacity: 0.6;
  }
  .bubbles div:nth-child(1) { left: 10%; animation-delay: 0s; }
  .bubbles div:nth-child(2) { left: 20%; animation-delay: 2s; width: 25px; height: 25px; }
  .bubbles div:nth-child(3) { left: 30%; animation-delay: 4s; }
  .bubbles div:nth-child(4) { left: 40%; animation-delay: 1s; width: 30px; height: 30px; }
  .bubbles div:nth-child(5) { left: 50%; animation-delay: 3s; }
  .bubbles div:nth-child(6) { left: 60%; animation-delay: 6s; width: 22px; height: 22px; }
  .bubbles div:nth-child(7) { left: 70%; animation-delay: 5s; }
  .bubbles div:nth-child(8) { left: 80%; animation-delay: 7s; width: 18px; height: 18px; }
  .bubbles div:nth-child(9) { left: 90%; animation-delay: 3s; width: 28px; height: 28px; }
  .bubbles div:nth-child(10) { left: 95%; animation-delay: 8s; width: 20px; height: 20px; }

  @keyframes bubble {
    0% { transform: translateY(0) scale(1); opacity: 0.7; }
    50% { transform: translateY(-400px) scale(1.2); }
    100% { transform: translateY(-800px) scale(1.5); opacity: 0; }
  }

  .stars, .stars2 {
    position: absolute;
    width: 200%;
    height: 200%;
    background-repeat: repeat;
    background-size: 100px 100px;
    z-index: 0;
  }
  .stars { background-image: radial-gradient(white 1px, transparent 1px); animation: starMove 100s linear infinite; opacity: 0.2; }
  .stars2 { background-image: radial-gradient(#ffffff 1px, transparent 1px); animation: starMove 120s linear infinite reverse; opacity: 0.1; }

  @keyframes starMove { from { transform: translate(0, 0); } to { transform: translate(-500px, -500px); } }

  #btn-rdv:hover {
    box-shadow: 0 0 12px 3px rgba(99, 102, 241, 0.75);
    animation: vibrate 0.3s linear infinite;
  }
  @keyframes vibrate {
    0% { transform: translate(0); }
    20% { transform: translate(-1px, 1px); }
    40% { transform: translate(-1px, -1px); }
    60% { transform: translate(1px, 1px); }
    80% { transform: translate(1px, -1px); }
    100% { transform: translate(0); }
  }

  @media (prefers-color-scheme: dark) {
    section.hero {
      background: #1a202c;
      color: #e2e8f0;
    }
    section.hero .container {
      background: rgba(30, 41, 59, 0.9);
    }
    section.hero #typing {
      border-right-color: #a78bfa;
      text-shadow: 2px 2px 6px rgba(0,0,0,0.4);
    }
    section.hero #btn-rdv:hover {
      box-shadow: 0 0 12px 3px rgba(167, 139, 250, 0.75);
    }
    section.hero .bubbles div {
      background: rgba(167, 139, 250, 0.3);
    }
    section.hero .stars { opacity: 0.4; }
    section.hero .stars2 { opacity: 0.2; }
  }
</style>

<script>
  const phrases = [
    { text: "Bienvenue à l’office notarial de Me EBEZOU Plinga Tcha", color: "#dc2626" },
    { text: "Votre partenaire de confiance pour tous vos actes juridiques", color: "#7c3aed" },
    { text: "Excellence et sécurité au service de votre patrimoine", color: "#059669" },
    { text: "Prenez rendez-vous facilement et gagnez en sérénité", color: "#db2777" }
  ];

  let phraseIndex = 0;
  let charIndex = 0;
  const typingElement = document.getElementById('typing');
  const subtitle = document.getElementById('subtitle');
  const btn = document.getElementById('btn-rdv');
  const typingSpeed = 100;
  const pauseBetweenPhrases = 3000;
  const gradientMap = {
    "#dc2626": "linear-gradient(90deg, #dc2626, #991b1b)",
    "#7c3aed": "linear-gradient(90deg, #7c3aed, #5b21b6)",
    "#059669": "linear-gradient(90deg, #059669, #065f46)",
    "#db2777": "linear-gradient(90deg, #db2777, #9d174d)"
  };

  function type() {
    const currentPhrase = phrases[phraseIndex];
    const nameStart = currentPhrase.text.indexOf("Me");
    let visibleText = currentPhrase.text.substring(0, charIndex + 1);
    if (nameStart !== -1 && charIndex >= nameStart) {
      const beforeName = currentPhrase.text.substring(0, nameStart);
      const namePart = currentPhrase.text.substring(nameStart, charIndex + 1);
      visibleText = `${beforeName}<span class="text-nom" style="color: ${currentPhrase.color}; font-weight: 900; font-style: italic;">${namePart}</span>`;
    }
    typingElement.innerHTML = visibleText;
    typingElement.style.color = currentPhrase.color;
    typingElement.style.borderRightColor = currentPhrase.color;
    btn.style.background = gradientMap[currentPhrase.color];
    charIndex++;
    if (charIndex === currentPhrase.text.length) {
      subtitle.classList.add('fade-in', 'slide-up');
      btn.classList.add('fade-in');
      setTimeout(erase, pauseBetweenPhrases);
    } else {
      typingElement.style.opacity = 1;
      setTimeout(type, typingSpeed);
    }
  }

  function erase() {
    if (typingElement.textContent.length === 0) {
      phraseIndex = (phraseIndex + 1) % phrases.length;
      charIndex = 0;
      subtitle.classList.remove('fade-in', 'slide-up');
      btn.classList.remove('fade-in');
      setTimeout(type, typingSpeed);
      return;
    }
    let textContent = typingElement.textContent;
    textContent = textContent.substring(0, textContent.length - 1);
    typingElement.textContent = textContent;
    setTimeout(erase, typingSpeed / 2);
  }

  window.onload = () => { type(); };


</script>
    <section id="services" class="services">
        <div class="container">
            <h2 class="section-title">Nos Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1604783125462-37d81c7385e6?q=80&w=1960&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Rédaction d’actes">
                    </div>
                    <div class="service-content">
                        <h3>Rédaction d’actes</h3>
                        <p>Contrats, testaments, donations, ventes immobilières et autres actes notariés.</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="data:image/jpeg;base64,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
                        " alt="Conseils juridiques">
                    </div>
                    <div class="service-content">
                        <h3>Conseils juridiques</h3>
                        <p>Accompagnement personnalisé sur les implications juridiques et fiscales de vos démarches.</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Achat et vente immobilière">
                    </div>
                    <div class="service-content">
                        <h3>Achat et vente immobilière</h3>
                        <p>Vérification de titres, actes de vente, hypothèques et accompagnement complet.</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=600&q=80" alt="Succession et héritage">
                    </div>
                    <div class="service-content">
                        <h3>Succession et héritage</h3>
                        <p>Gestion des dossiers de succession, partage d’héritage et conseils pour vos démarches successorales.</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="https://images.unsplash.com/photo-1589391886645-d51941baf7fb?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Mariage et régime matrimonial">
                    </div>
                    <div class="service-content">
                        <h3>Mariage et régime matrimonial</h3>
                        <p>Conseils et rédaction d’actes pour le choix du régime matrimonial et la protection du couple.</p>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img">
                        <img src="https://plus.unsplash.com/premium_photo-1661497281000-b5ecb39a2114?q=80&w=1170&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Authentification de documents">
                    </div>
                    <div class="service-content">
                        <h3>Authentification de documents</h3>
                        <p>Légalisation, certification et authentification de tous vos documents officiels.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="rendezvous" class="contact-section">
  <div class="contact-container">
    <h2 class="contact-title">Prendre un Rendez-vous</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="flash success" id="flash-success">{{ session('success') }}</div>
    @endif

    {{-- Message d’erreur --}}
    @if(session('error'))
        <div class="flash error" id="flash-error">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('rendezvous.store') }}" class="contact-form">
      @csrf

      <div class="input-box">
        <input type="text" name="fullname" id="fullname" required placeholder=" " />
        <label for="fullname">Nom complet</label>
      </div>

      <div class="input-box">
        <input type="tel" name="phone" id="phone" required placeholder=" " />
        <label for="phone">Téléphone</label>
      </div>

      <div class="input-box">
        <input type="email" name="email" id="email" required placeholder=" " />
        <label for="email">Adresse e-mail</label>
      </div>

      <div class="input-box">
        <input type="text" name="ville" id="ville" required placeholder=" " />
        <label for="ville">Ville</label>
      </div>

      <div class="form-row">
        <div class="input-box">
          <input type="date" name="date" id="date" required placeholder=" " />
          <label for="date">Date</label>
        </div>

        <div class="input-box">
          <input type="time" name="heure" id="heure" required placeholder=" " />
          <label for="heure">Heure</label>
        </div>
      </div>

      <div class="input-box">
        <select name="type_acte" id="type_acte" required>
          <option value="" hidden disabled selected></option>
          <option value="Vente immobilière">Vente immobilière</option>
          <option value="Mariage">Mariage</option>
          <option value="Donations">Donations</option>
          <option value="Succession">Succession</option>
          <option value="Conseil juridique">Conseil juridique</option>
          <option value="Authentification de documents">Authentification de documents</option>
          <option value="Autre">Autre</option>
        </select>
        <label for="type_acte">Type de rendez-vous</label>
      </div>

      <button type="submit" class="contact-btn">Valider la demande</button>
    </form>
  </div>
</section>

<!-- Script pour disparition automatique des messages -->
<script>
    setTimeout(() => {
        const success = document.getElementById('flash-success');
        const error = document.getElementById('flash-error');
        if (success) success.style.display = 'none';
        if (error) error.style.display = 'none';
    }, 5000);
</script>


    <footer id="contact">
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h3>Plateforme Notariale</h3>
                    <p>Votre partenaire pour tous vos actes et conseils notariaux.</p>
                </div>
                <div class="footer-col">
                    <h3>Contact</h3>
                    <ul>
                        <li>Kiga</li>
                        <li>+250 788 123 456</li>
                        <li>info@notaria.rw</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Liens rapides</h3>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#services">Services</a></li>
                        <li><a href="#rendezvous">Prendre RDV</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Plateforme Notariale. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
    @if(session('success'))
    <div style="background:#d4edda;color:#155724;padding:1rem;margin:1rem auto;max-width:600px;border-radius:8px;text-align:center;">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div style="background:#f8d7da;color:#721c24;padding:1rem;margin:1rem auto;max-width:600px;border-radius:8px;text-align:center;">
        {{ session('error') }}
    </div>
@endif
</body>
</html>