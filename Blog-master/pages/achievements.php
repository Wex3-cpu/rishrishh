<?php
$page_title = "Achievements - Irish Cueva";
include 'includes/header.php';
?>

<main class="container">
    <section class="custom-gallery-section">

        <!-- ─── 3-Tab Navigation (matches Portfolio style) ─── -->
        <div class="gal-tabs">
            <div id="tab-tertiary" class="gal-tab active" onclick="switchAchTab('tertiary')" title="Tertiary Education">
                <span class="ach-tab-emoji">🎓</span>
                <span>TERTIARY</span>
            </div>
            <div id="tab-senior" class="gal-tab" onclick="switchAchTab('senior')" title="Senior High School">
                <span class="ach-tab-emoji">🌟</span>
                <span>SENIOR HIGH</span>
            </div>
            <div id="tab-junior" class="gal-tab" onclick="switchAchTab('junior')" title="Junior High & Basic Education">
                <span class="ach-tab-emoji">🏫</span>
                <span>JUNIOR HIGH &amp; BASIC</span>
            </div>
        </div>

        <!-- ─── Tab 1: Tertiary Education ─── -->
        <div id="grid-tertiary" class="ach-tab-content">
            <div class="ach-cards-header">
                <h3 class="ach-section-label">🎓 Tertiary Education (College)</h3>
                <p class="ach-section-sub">Talisay City College · BSIT Program</p>
            </div>
            <div class="timeline-grid ach-timeline-grid">

                <div class="timeline-card college-card" style="--ach-delay:1;">
                    <div class="badge-icon">🏅</div>
                    <div class="card-info">
                        <span class="timeline-tag">Dean's Lister</span>
                        <h4>2025 - 2026 | 1st Semester</h4>
                        <p class="institution">Talisay City College</p>
                        <p class="desc">BSIT program. Recognized for outstanding GPA and academic consistency in technical modules.</p>
                    </div>
                </div>

                <div class="timeline-card college-card" style="--ach-delay:2;">
                    <div class="badge-icon">🏅</div>
                    <div class="card-info">
                        <span class="timeline-tag">Dean's Lister</span>
                        <h4>2024 - 2025 | 1st &amp; 2nd Semester</h4>
                        <p class="institution">Talisay City College</p>
                        <p class="desc">BSIT program. Maintained academic excellence for two consecutive semesters of IT coursework.</p>
                    </div>
                </div>

                <div class="timeline-card college-card" style="--ach-delay:3;">
                    <div class="badge-icon">🏅</div>
                    <div class="card-info">
                        <span class="timeline-tag">Dean's Lister</span>
                        <h4>2023 - 2024 | 1st Semester</h4>
                        <p class="institution">Talisay City College</p>
                        <p class="desc">BSIT program. Placed on the Dean's List during the initial introductory semester of IT studies.</p>
                    </div>
                </div>

            </div>

            <!-- Summary badge at bottom of tab -->
            <div class="ach-tab-summary college-summary">
                🏅 <strong>4 consecutive Dean's List</strong> semesters — 2023 to 2026
            </div>
        </div>

        <!-- ─── Tab 2: Senior High School ─── -->
        <div id="grid-senior" class="ach-tab-content" style="display:none;">
            <div class="ach-cards-header">
                <h3 class="ach-section-label">🌟 Senior High School</h3>
                <p class="ach-section-sub">Academia System Global Colleges · S.Y. 2021–2023</p>
            </div>
            <div class="timeline-grid ach-timeline-grid">

                <div class="timeline-card shs-card" style="--ach-delay:1;">
                    <div class="badge-icon">🌟</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-honor">With Honor</span>
                        <h4>Grade 11 | S.Y. 2021 - 2022</h4>
                        <p class="institution">Academia System Global Colleges</p>
                        <p class="desc">Maintained a high general average in Grade 11, demonstrating consistent academic discipline across all tracks.</p>
                    </div>
                </div>

                <div class="timeline-card shs-card" style="--ach-delay:2;">
                    <div class="badge-icon">🌟</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-honor">With Honor</span>
                        <h4>Grade 12 | S.Y. 2022 - 2023</h4>
                        <p class="institution">Academia System Global Colleges</p>
                        <p class="desc">Graduated with academic honor, completing the senior high curriculum with excellence and distinction.</p>
                    </div>
                </div>

            </div>

            <div class="ach-tab-summary shs-summary">
                🌟 <strong>With Honor</strong> — Grades 11 &amp; 12 · 2021–2023
            </div>
        </div>

        <!-- ─── Tab 3: Junior High & Basic Education ─── -->
        <div id="grid-junior" class="ach-tab-content" style="display:none;">
            <div class="ach-cards-header">
                <h3 class="ach-section-label">🏫 Junior High &amp; Basic Education</h3>
                <p class="ach-section-sub">St. Scholastica's Academy · Tabunok National High School · Tabunoc Central School</p>
            </div>
            <div class="timeline-grid ach-timeline-grid">

                <div class="timeline-card jhs-card" style="--ach-delay:1;">
                    <div class="badge-icon">⭐</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-honor">With Honor</span>
                        <h4>Grade 10 | S.Y. 2020 - 2021</h4>
                        <p class="institution">Tabunok National High School</p>
                        <p class="desc">Completed Junior High School curriculum with strong academic standing and high general average.</p>
                    </div>
                </div>

                <div class="timeline-card jhs-card" style="--ach-delay:2;">
                    <div class="badge-icon">⭐</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-honor">With Honors</span>
                        <h4>Grade 9 | S.Y. 2019 - 2020</h4>
                        <p class="institution">Tabunok National High School</p>
                        <p class="desc">Received grade average commendations for consistent study habits and exemplary discipline.</p>
                    </div>
                </div>

                <div class="timeline-card conduct-card" style="--ach-delay:3;">
                    <div class="badge-icon">🎖️</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-conduct">Conduct Award</span>
                        <h4>Grade 8 | S.Y. 2018 - 2019</h4>
                        <p class="institution">St. Scholastica's Academy - Tabunok</p>
                        <p class="desc">Awarded for exemplary character, leadership, compliance with school guidelines, and service to peers.</p>
                    </div>
                </div>

                <div class="timeline-card conduct-card" style="--ach-delay:4;">
                    <div class="badge-icon">🎖️</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-conduct">Conduct Award</span>
                        <h4>Grade 7 | S.Y. 2017 - 2018</h4>
                        <p class="institution">St. Scholastica's Academy - Tabunok</p>
                        <p class="desc">Recognized for displaying high ethical standards, outstanding peer relations, and discipline.</p>
                    </div>
                </div>

                <div class="timeline-card jhs-card" style="--ach-delay:5;">
                    <div class="badge-icon">✏️</div>
                    <div class="card-info">
                        <span class="timeline-tag tag-basic">Basic Education</span>
                        <h4>Elementary | S.Y. 2011 - 2017</h4>
                        <p class="institution">Tabunoc Central School</p>
                        <p class="desc">Completed primary education foundation, building strong academic and social skills throughout six years of basic schooling.</p>
                    </div>
                </div>

            </div>

            <div class="ach-tab-summary jhs-summary">
                ⭐ <strong>2 Academic Honors</strong> + 🎖️ <strong>2 Conduct Awards</strong> across Grades 7–10
            </div>
        </div>

    </section>
</main>

<script>
    let activeAchTab = 'tertiary';

    function switchAchTab(tabName) {
        if (activeAchTab === tabName) return;

        // Hide current tab content
        document.getElementById('grid-' + activeAchTab).style.display = 'none';
        document.getElementById('tab-' + activeAchTab).classList.remove('active');

        // Show new tab content
        activeAchTab = tabName;
        const newGrid = document.getElementById('grid-' + tabName);
        newGrid.style.display = 'block';
        newGrid.classList.remove('ach-fadeIn');
        void newGrid.offsetWidth; // force reflow for re-animation
        newGrid.classList.add('ach-fadeIn');
        document.getElementById('tab-' + tabName).classList.add('active');
    }

    // Support URL deep-linking: ?page=achievements&tab=senior
    window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const tabParam = urlParams.get('tab');
        if (tabParam && ['tertiary', 'senior', 'junior'].includes(tabParam)) {
            switchAchTab(tabParam);
        }
    });
</script>

<?php include 'includes/footer.php'; ?>