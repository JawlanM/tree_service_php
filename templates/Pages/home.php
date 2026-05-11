<?= $this->Html->css('style') ?>
<!-- HEADER -->
<header>
    <div class="header-inner">
        <div class="logo">
            <span class="logo-icon"></span>
            Arborist Specialist
        </div>
        <nav class="nav">
            <a href="#">Home</a>
            <a href="#services">Services</a>
            <a href="#why">Why Us</a>
            <a href="#contact">Contact</a>
        </nav>
        <div class="header-actions">
            <a href="tel:04XXXXXXXX" class="header-phone">
                <span class="phone-icon"></span>
                04XX XXX XXX
            </a>
            <a href="/users/login" class="login-link">Login</a>
        </div>
    </div>
</header>
<!-- HERO -->
<section class="hero">
    <div class="hero-inner">
        <span class="hero-badge">Certified Arborists in Melbourne</span>
        <h1 class="hero-title">
            Expert Tree Removal,<br>Pruning &amp; Health Care
        </h1>
        <p class="hero-subtitle">
            Trusted by local homeowners for safe, professional arborist services.
            Fully insured and committed to quality.
        </p>
        <div class="hero-cta">
            <a href="/contact-messages/add" class="btn-primary">Get Free Quote</a>
            <a href="#services" class="btn-secondary">Our Services</a>
        </div>
        <div class="hero-trust">
            <div class="trust-item">
                <span class="trust-icon">✓</span>
                <span>Fully Insured</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">✓</span>
                <span>Free Quotes</span>
            </div>
            <div class="trust-item">
                <span class="trust-icon">✓</span>
                <span>Same Day Response</span>
            </div>
        </div>
    </div>
</section>
<!-- MAIN -->
<main>
    <section class="content-section">
        <div class="container">
            <!-- SERVICES -->
            <div class="section-header">
                <span class="section-label">What We Offer</span>
                <h2 id="services" class="section-title">Our Services</h2>
                <p class="section-subtitle">Professional tree care solutions for residential and commercial properties</p>
            </div>
            <div class="services-container">
                <div class="service-card">
                    <div class="service-icon-wrap">
                        <img src="/img/tree_removal.png" alt="Tree Removal">
                    </div>
                    <h3 class="service-title">Tree Removal</h3>
                    <p class="service-desc">
                        Safe, efficient removal of hazardous or unwanted trees with complete site cleanup.
                    </p>
                    <a href="/contact-messages/add" class="service-link">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon-wrap">
                        <img src="/img/prune_trim.png" alt="Pruning & Trimming">
                    </div>
                    <h3 class="service-title">Pruning &amp; Trimming</h3>
                    <p class="service-desc">
                        Improve tree health, shape, and safety with expert pruning techniques.
                    </p>
                    <a href="/contact-messages/add" class="service-link">Learn More →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon-wrap health">
                        <img src="/img/health_care.png" alt="Tree Health Care">
                    </div>
                    <h3 class="service-title">Tree Health Care</h3>
                    <p class="service-desc">
                        Diagnosis, treatment, and long-term care plans for healthy, thriving trees.
                    </p>
                    <a href="/contact-messages/add" class="service-link">Learn More →</a>
                </div>
            </div>
            <!-- WHY CHOOSE US -->
            <div class="section-header">
                <span class="section-label">The Difference</span>
                <h2 id="why" class="section-title">Why Choose Us</h2>
            </div>
            <div class="why-grid">
                <div class="why-item">
                    <div class="why-icon"></div>
                    <h4>Certified Arborists</h4>
                    <p>Qualified professionals with extensive training and industry certifications.</p>
                </div>
                <div class="why-item">
                    <div class="why-icon">️</div>
                    <h4>Safety First</h4>
                    <p>Rigorous safety protocols and fully insured operations for your peace of mind.</p>
                </div>
                <div class="why-item">
                    <div class="why-icon"></div>
                    <h4>Responsive Team</h4>
                    <p>Quick response times and flexible scheduling to meet your needs.</p>
                </div>
                <div class="why-item">
                    <div class="why-icon"></div>
                    <h4>Quality Guarantee</h4>
                    <p>We stand behind our work with comprehensive after-service support.</p>
                </div>
            </div>
            <!-- CTA BANNER -->
            <div class="cta-banner">
                <div class="cta-content">
                    <h3>Ready to Get Started?</h3>
                    <p>Contact us today for a free, no-obligation quote on your tree care needs.</p>
                </div>
                <a href="/contact-messages/add" class="btn-primary">Request Quote</a>
            </div>
            <!-- CONTACT -->
            <div id="contact" class="contact-section">
                <div class="contact-info">
                    <h2 class="contact-heading">Get In Touch</h2>
                    <p class="contact-intro">The team is looking forward to working with you!</p>
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-icon"></span>
                            <div>
                                <strong>Phone</strong>
                                <p>04XX XXX XXX</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">✉️</span>
                            <div>
                                <strong>Email</strong>
                                <p>info@arborist.com</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon"></span>
                            <div>
                                <strong>Location</strong>
                                <p>Melbourne, VIC</p>
                            </div>
                        </div>
                    </div>
                    <a href="/contact-messages/add" class="btn-primary contact-btn">
                        Send Us a Message
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- FOOTER -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-inner">
            <div class="footer-brand">
                <span class="logo">Arborist Specialist</span>
                <p>Professional tree care services in Melbourne and surrounding areas.</p>
            </div>
            <div class="footer-links">
                <a href="#">Home</a>
                <a href="#services">Services</a>
                <a href="#contact">Contact</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="footer-copy">
                © <?= date('Y') ?> Arborist Specialist. All rights reserved.
            </div>
        </div>
    </div>
</footer>
