@extends('layouts.page')

@section('content')
    <section class="slider">
        <img src={{asset("assets/images/slide-3.jpg")}} alt="Slider">
    </section>

    <section class="about">
        <div class="about-card about-card-left">
            <img class="about-card-img" src={{asset("assets/images/slide-1.jpg")}} alt="About">
        </div>
        <div class="about-card about-card-right">
            <h3 class="about-card-title"><span class="title-about">À Propos De</span> Notre Ecole</h3>
            <p class="about-card-content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore officiis assumenda harum nobis dignissimos totam doloremque eius, esse odit minima, quisquam, a doloribus vel id enim quis optio nostrum aspernatur!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto magnam, quos officia ducimus laudantium eveniet eaque sequi dignissimos nesciunt blanditiis! Illo facilis assumenda in molestiae dolorem sequi quibusdam quo labore.
            </p>
            <a href="" class="about-card-link card-link">En savoir plus <i class="bi bi-arrow-right"></i></a>
        </div>
    </section>

    <section class="feacture">
        <div class="feacture-card feacture-card-left">
            <h3 class="feacture-card-title">Nos<span class="feacture-title"> Spécificités</span></h3>
            <p class="feacture-card-content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum aut officia ab corporis? Vero, officia blanditiis. Non temporibus neque saepe, nostrum cupiditate accusamus, autem at odio beatae, deleniti dolor sit.</p>
            <div class="feacture-card-row">
                <div class="feacture-card-col">
                    <div class="col-left">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>
                    <div class="col-right">
                        <span class="number">12</span>
                        <span class="slug">Prix</span>
                    </div>
                </div>
                <div class="feacture-card-col">
                    <div class="col-left">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="col-right">
                        <span class="number">{{$nb_enseignants}}+</span>
                        <span class="slug">Enseignants</span>
                    </div>
                </div>
                <div class="feacture-card-col">
                    <div class="col-left">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="col-right">
                        <span class="number">{{$nb_classes}}</span>
                        <span class="slug">Filières</span>
                    </div>
                </div>
                <div class="feacture-card-col">
                    <div class="col-left">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="col-right">
                        <span class="number">{{$nb_eleves}}</span>
                        <span class="slug">Etudiants</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="feacture-card feacture-card-right">
            <img src={{asset('assets/images/home-846x1002.jpg')}} alt="Feactures" class="feacture-card-img">
        </div>
    </section>

    <section class="events">
        <div class="event-title">
            <h3>Événements</h3>
        </div>
        <div class="event-row-container">
            <article class="event-card">
                <a href="/">
                    <div class="event-card-img">
                        <img src={{asset('assets/images/image-gallery/2.jpg')}} alt="Event">
                    </div>
                    <div class="event-card-content">
                        <div class="event-card-content-meta">
                            <span class="day">31</span>
                            <span class="month">Septembre</span>
                            <span class="time">4:00 PM</span>
                        </div>
                        <div class="event-card-content-title">
                            <a href="">Conférence sur les nouvelles technologies</a>
                        </div>
                    </div>
                </a>
            </article>
            <article class="event-card">
                <a href="/">
                    <div class="event-card-img">
                        <img src={{asset('assets/images/image-gallery/3.jpg')}} alt="Event">
                    </div>
                    <div class="event-card-content">
                        <div class="event-card-content-meta">
                            <span class="day">31</span>
                            <span class="month">Septembre</span>
                            <span class="time">4:00 PM</span>
                        </div>
                        <div class="event-card-content-title">
                            <a href="">Conférence sur les nouvelles technologies</a>
                        </div>
                    </div>
                </a>
            </article>
            <article class="event-card">
                <a href="/">
                    <div class="event-card-img">
                        <img src={{asset('assets/images/image-gallery/4.jpg')}} alt="Event">
                    </div>
                    <div class="event-card-content">
                        <div class="event-card-content-meta">
                            <span class="day">31</span>
                            <span class="month">Septembre</span>
                            <span class="time">4:00 PM</span>
                        </div>
                        <div class="event-card-content-title">
                            <a href="">Conférence sur les nouvelles technologies</a>
                        </div>
                    </div>
                </a>
            </article>
            <article class="event-card">
                <a href="/">
                    <div class="event-card-img">
                        <img src={{asset('assets/images/image-gallery/5.jpg')}} alt="Event">
                    </div>
                    <div class="event-card-content">
                        <div class="event-card-content-meta">
                            <span class="day">31</span>
                            <span class="month">Septembre</span>
                            <span class="time">4:00 PM</span>
                        </div>
                        <div class="event-card-content-title">
                            <a href="">Conférence sur les nouvelles technologies</a>
                        </div>
                    </div>
                </a>
            </article>
        </div>
        <div class="event-row-link"><a href="" class="card-link">Voir le calendrier des événements <i class="bi bi-arrow-right"></i></a></div>
    </section>

    <section class="gallerys">
        <div class="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/1.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/2.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/3.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/4.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/5.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/6.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/7.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/8.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/9.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/10.jpg')}} alt="Gallery">
            <img loading="lazy" src={{asset('assets/images/image-gallery/11.jpg')}} alt="Gallery">
        </div>
    </section>

    <section class="news">
        <div class="news-title">
            <h3>Dernières Actualités</h3>
        </div>
        <div class="news-row-container">
            <article class="news-card">
                <a href="/">
                    <div class="news-card-img">
                        <img src={{asset('assets/images/image-gallery/10.jpg')}} alt="News">
                    </div>

                    <div class="news-card-col">
                        <a href="" class="news-card-title">Un élèves tue son camarade de classe</a>
                        <p class="news-card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ex natus officia recusandae asperiores dolore, delectus dicta deleniti quae rerum facere officiis fugit suscipit omnis non dignissimos eius dolores voluptatum.</p>
                        <span class="news-card-pass-day"><i class="bi bi-calendar3"></i> 2 jours passé</span>
                    </div>
                </a>
            </article>
            <article class="news-card">
                <a href="/">
                    <div class="news-card-img">
                        <img src={{asset('assets/images/image-gallery/6.jpg')}} alt="News">
                    </div>

                    <div class="news-card-col">
                        <a href="" class="news-card-title">Un élèves tue son camarade de classe</a>
                        <p class="news-card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ex natus officia recusandae asperiores dolore, delectus dicta deleniti quae rerum facere officiis fugit suscipit omnis non dignissimos eius dolores voluptatum.</p>
                        <span class="news-card-pass-day"><i class="bi bi-calendar3"></i> 2 jours passé</span>
                    </div>
                </a>
            </article>
            <article class="news-card">
                <a href="/">
                    <div class="news-card-img">
                        <img src={{asset('assets/images/image-gallery/8.jpg')}} alt="News">
                    </div>

                    <div class="news-card-col">
                        <a href="" class="news-card-title">Un élèves tue son camarade de classe</a>
                        <p class="news-card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ex natus officia recusandae asperiores dolore, delectus dicta deleniti quae rerum facere officiis fugit suscipit omnis non dignissimos eius dolores voluptatum.</p>
                        <span class="news-card-pass-day"><i class="bi bi-calendar3"></i> 2 jours passé</span>
                    </div>
                </a>
            </article>
            <article class="news-card">
                <a href="/">
                    <div class="news-card-img">
                        <img src={{asset('assets/images/image-gallery/7.jpg')}} alt="News">
                    </div>

                    <div class="news-card-col">
                        <a href="" class="news-card-title">Un élèves tue son camarade de classe</a>
                        <p class="news-card-content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut ex natus officia  dignissimos eius dolores voluptatum.</p>
                        <span class="news-card-pass-day"><i class="bi bi-calendar3"></i> 2 jours passé</span>
                    </div>
                </a>
            </article>
        </div>
        <div class="news-row-link"><a href="" class="card-link">Voir toutes les actualités <i class="bi bi-arrow-right"></i></a></div>
    </section>

@endsection
