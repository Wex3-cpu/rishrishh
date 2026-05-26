<?php
$page_title = "About - Irish Cueva";
include 'includes/header.php';

// Check if the uploaded profile image exists to sync it dynamically
$avatar_img = "uploads/profile.jpg.jpg";
$has_avatar = file_exists($avatar_img);
?>

<main class="container">
    <section class="profile-page-section">

        <!-- ─── TOP PROFILE CARD ─── -->
        <div class="profile-hero-card">
            <!-- Sleek Decorative Gradient Cover Banner -->
            <div class="profile-cover-banner">
                <div class="banner-gradient-overlay"></div>
                <div class="banner-glow-circle circle-1"></div>
                <div class="banner-glow-circle circle-2"></div>
            </div>
            
            <div class="profile-hero-content-wrapper">
                <div class="profile-hero-left">
                    <div class="profile-picture-large-wrapper">
                        <div class="profile-picture-large">
                            <?php if ($has_avatar): ?>
                                <img src="<?php echo $avatar_img; ?>" 
                                     alt="Irish Cueva" 
                                     class="profile-photo"
                                     onerror="this.style.display='none'; document.getElementById('profile-fallback').style.display='inline-flex';">
                            <?php endif; ?>
                            <div class="avatar-initials avatar-initials-xxl" id="profile-fallback" style="<?php echo $has_avatar ? 'display:none;' : 'display:inline-flex;'; ?>">IC</div>
                        </div>
                        <span class="online-status-pulse" title="Active Web Developer"></span>
                    </div>
                    
                    <h2 class="profile-name">Irish Cueva <span class="verified-check" title="Verified Professional">✔</span></h2>
                    <p class="profile-title">Web Developer & IT Student</p>
                    
                    <!-- Quick Specs Badges -->
                    <div class="profile-specs-badges">
                        <span class="spec-badge"><span class="badge-icon">📍</span> Talisay City, Cebu</span>
                        <span class="spec-badge"><span class="badge-icon">🎓</span> Talisay City College</span>
                        <span class="spec-badge"><span class="badge-icon">💻</span> BSIT Student</span>
                    </div>

                    <!-- Connect / Action Buttons -->
                    <div class="profile-action-buttons">
                        <a href="mailto:irishamarocueva@gmail.com" class="profile-btn btn-primary-glass">
                            ✉️ Email Me
                        </a>
                        <a href="index.php?page=contact" class="profile-btn btn-secondary-glass">
                            💬 Message
                        </a>
                        <a href="index.php?page=portfolio" class="profile-btn btn-tertiary-glass">
                            🎨 Portfolio
                        </a>
                    </div>
                </div>
                
                <div class="profile-hero-right">
                    <div class="profile-intro-box">
                        <h3 class="intro-heading">Hi, I'm Irish Cueva!</h3>
                        <p class="intro-text">I'm a passionate web developer and IT student based in Talisay City, Cebu. I love creating beautiful and functional websites that solve real-world problems.</p>
                    </div>

                    <!-- Personal Details + Hobbies Side by Side -->
                    <div class="profile-details-hobbies-row">
                        <!-- Personal Details -->
                        <div class="profile-details-card">
                            <h4 class="section-subheading">📋 Personal Details</h4>
                            <div class="personal-details-grid">
                                <div class="detail-grid-item">
                                    <span class="detail-icon">🎂</span>
                                    <div class="detail-content">
                                        <label>Date of Birth</label>
                                        <strong>November 27, 2004</strong>
                                    </div>
                                </div>
                                <div class="detail-grid-item">
                                    <span class="detail-icon">📍</span>
                                    <div class="detail-content">
                                        <label>Place of Birth</label>
                                        <strong>Old Namangka, Mabinay, Negros Oriental</strong>
                                    </div>
                                </div>
                                <div class="detail-grid-item">
                                    <span class="detail-icon">⏳</span>
                                    <div class="detail-content">
                                        <label>Age</label>
                                        <strong>20 years old</strong>
                                    </div>
                                </div>
                                <div class="detail-grid-item">
                                    <span class="detail-icon">📏</span>
                                    <div class="detail-content">
                                        <label>Height & Weight</label>
                                        <strong>4'9" | 92 lbs.</strong>
                                    </div>
                                </div>
                                <div class="detail-grid-item">
                                    <span class="detail-icon">🇵🇭</span>
                                    <div class="detail-content">
                                        <label>Citizenship</label>
                                        <strong>Filipino</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Hobbies & Interests -->
                        <div class="profile-hobbies-card">
                            <h4 class="section-subheading">✨ Hobbies & Interests</h4>
                            <div class="hobbies-modern-grid">
                                <div class="hobby-card-item">
                                    <span class="hobby-card-icon books">📚</span>
                                    <span class="hobby-card-label">Reading Books</span>
                                </div>
                                <div class="hobby-card-item">
                                    <span class="hobby-card-icon movies">🎬</span>
                                    <span class="hobby-card-label">Watching Movies</span>
                                </div>
                                <div class="hobby-card-item">
                                    <span class="hobby-card-icon games">🎮</span>
                                    <span class="hobby-card-label">Playing Games</span>
                                </div>
                                <div class="hobby-card-item">
                                    <span class="hobby-card-icon coffee">☕</span>
                                    <span class="hobby-card-label">DIY Coffee</span>
                                </div>
                                <div class="hobby-card-item">
                                    <span class="hobby-card-icon music">🎵</span>
                                    <span class="hobby-card-label">Listening to Music</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ─── EDUCATION + ACHIEVEMENTS ROW ─── -->
        <div class="profile-bottom-row">

            <!-- Educational Attainment Timeline -->
            <div class="profile-education-card">
                <h3 class="section-heading">🎓 Educational Attainment</h3>
                
                <div class="timeline-container">
                    <div class="timeline-line"></div>
                    
                    <div class="timeline-item" style="--timeline-color: #6366f1;">
                        <div class="timeline-badge">🎓</div>
                        <div class="timeline-content">
                            <span class="timeline-period">2023 - Present</span>
                            <h4 class="timeline-title">Tertiary Education</h4>
                            <p class="timeline-institution">Talisay City College</p>
                            <p class="timeline-loc">Poblacion, Talisay City, Cebu</p>
                            <span class="timeline-badge-pill">BSIT Student</span>
                        </div>
                    </div>

                    <div class="timeline-item" style="--timeline-color: #10b981;">
                        <div class="timeline-badge">📚</div>
                        <div class="timeline-content">
                            <span class="timeline-period">Secondary Education</span>
                            
                            <div class="timeline-sub-item">
                                <span class="sub-period">S.Y. 2021 - 2023</span>
                                <p class="timeline-institution">Academia System Global Colleges</p>
                                <span class="timeline-sub-badge">Senior High School</span>
                            </div>
                            <div class="timeline-sub-item">
                                <span class="sub-period">S.Y. 2019 - 2021</span>
                                <p class="timeline-institution">Tabunok National High School</p>
                                <span class="timeline-sub-badge">Junior High School</span>
                            </div>
                            <div class="timeline-sub-item">
                                <span class="sub-period">S.Y. 2017 - 2019</span>
                                <p class="timeline-institution">St. Scholastica's Academy - Tabunok</p>
                                <span class="timeline-sub-badge">Junior High School</span>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-item" style="--timeline-color: #f43f5e;">
                        <div class="timeline-badge">✏️</div>
                        <div class="timeline-content">
                            <span class="timeline-period">2011 - 2017</span>
                            <h4 class="timeline-title">Basic Education</h4>
                            <p class="timeline-institution">Tabunoc Central School</p>
                            <span class="timeline-badge-pill">Elementary School</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Academic Achievements -->
            <div class="profile-achievements-card">
                <h3 class="section-heading">🏆 Academic Achievements</h3>

                <!-- Highlighted Dean's Lister Showcase Card -->
                <div class="deans-lister-showcase-card">
                    <div class="showcase-glow"></div>
                    <div class="showcase-content">
                        <span class="showcase-badge">👑 Outstanding Academic Performance</span>
                        <h4>Dean's List Honoree</h4>
                        <p class="showcase-desc">Consistently achieving top honors at Talisay City College throughout BSIT studies.</p>
                        <div class="semesters-row">
                            <span class="sem-tag">1st Sem '23-'24</span>
                            <span class="sem-tag">1st Sem '24-'25</span>
                            <span class="sem-tag">2nd Sem '24-'25</span>
                            <span class="sem-tag">1st Sem '25-'26</span>
                        </div>
                    </div>
                </div>

                <div class="achievements-timeline">
                    <!-- College Achievements -->
                    <div class="ach-group">
                        <h4 class="ach-group-title"><span class="group-dot college"></span> College Recognition</h4>
                        <div class="ach-cards-list">
                            <div class="ach-mini-card">
                                <span class="ach-mini-icon">🏅</span>
                                <div class="ach-mini-details">
                                    <h5>Dean's Lister (4 Semesters)</h5>
                                    <p>Talisay City College — S.Y. 2023 - Present</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Senior High Achievements -->
                    <div class="ach-group">
                        <h4 class="ach-group-title"><span class="group-dot shs"></span> Senior High School</h4>
                        <div class="ach-cards-list">
                            <div class="ach-mini-card">
                                <span class="ach-mini-icon">🌟</span>
                                <div class="ach-mini-details">
                                    <h5>Grade 11 & 12 - With Honors</h5>
                                    <p>Academia System Global Colleges — S.Y. 2021 - 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Junior High Achievements -->
                    <div class="ach-group">
                        <h4 class="ach-group-title"><span class="group-dot jhs"></span> Junior High & Secondary</h4>
                        <div class="ach-cards-list">
                            <div class="ach-mini-card">
                                <span class="ach-mini-icon">⭐</span>
                                <div class="ach-mini-details">
                                    <h5>Grade 9 & 10 - With Honors</h5>
                                    <p>Consistent academic excellence recognition</p>
                                </div>
                            </div>
                            <div class="ach-mini-card">
                                <span class="ach-mini-icon">🎖️</span>
                                <div class="ach-mini-details">
                                    <h5>Grade 7 & 8 - Conduct Award</h5>
                                    <p>Recognized for exemplary behavior and discipline</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Metrics Dashboard Summary -->
                <div class="achievement-metrics-dashboard">
                    <div class="metric-block">
                        <span class="metric-num">4</span>
                        <span class="metric-label">Dean's List Semesters</span>
                    </div>
                    <div class="metric-block">
                        <span class="metric-num">4<sub>Yrs</sub></span>
                        <span class="metric-label">Academic Honors</span>
                    </div>
                    <div class="metric-block">
                        <span class="metric-num">2<sub>Yrs</sub></span>
                        <span class="metric-label">Conduct Awards</span>
                    </div>
                </div>
            </div>

        </div><!-- /.profile-bottom-row -->

    </section>
</main>

<?php include 'includes/footer.php'; ?>