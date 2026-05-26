<?php
$page_title = "Portfolio - Irish Cueva";
include 'includes/header.php';

// Check if the uploaded profile image exists to sync it dynamically
$avatar_img = "uploads/profile.jpg.jpg";
$has_avatar = file_exists($avatar_img);
?>

<main class="container">
    <section class="custom-gallery-section">
        <!-- 📸 Gallery Profile Header -->
        <div class="gal-profile-header">
            <div class="gal-avatar-container">
                <div class="gal-avatar">
                    <?php if ($has_avatar): ?>
                        <img src="<?php echo $avatar_img; ?>" alt="Irish Cueva Profile Picture">
                    <?php else: ?>
                        <span>IC</span>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="gal-profile-details">
                <div class="gal-username-row">
                    <h2 class="gal-username">irish_cueva <span class="verified-badge" title="Verified Professional">✔</span></h2>
                    <a href="index.php?page=contact" class="gal-btn-message">Message</a>
                    <a href="index.php?page=portfolio" class="gal-btn-portfolio">Portfolio</a>
                </div>
                
                <div class="gal-stats-row">
                    <span><strong>7</strong> posts</span>
                    <span><strong>10+</strong> skills verified</span>
                    <span><strong>100%</strong> CSS NC II success</span>
                </div>
                
                <div class="gal-bio">
                    <h1 class="gal-full-name">Irish Cueva</h1>
                    <p class="gal-category">Computer Systems Servicing NC II & IoT Automation</p>
                    <p class="gal-bio-text">
                        ⚡ Professional certification & achievements showcase<br>
                        🎓 Specializing in computer networking, systems diagnostics, and hardware integration<br>
                        💡 Merging IoT connectivity with modern server architectures
                    </p>
                    <a href="index.php?page=profile" class="gal-bio-link">🔗 Learn more in my Bio</a>
                </div>
            </div>
        </div>

        <!-- 📑 Gallery Tab Menu (Interactive!) -->
        <div class="gal-tabs">
            <div id="tab-certifications" class="gal-tab active" onclick="switchTab('certifications')" title="Show Professional Certifications">
                <svg class="gal-tab-icon" viewBox="0 0 24 24" width="12" height="12">
                    <rect x="3" y="3" width="18" height="18" rx="2" fill="none" stroke="currentColor" stroke-width="2"/>
                    <line x1="9" y1="3" x2="9" y2="21" stroke="currentColor" stroke-width="2"/>
                    <line x1="15" y1="3" x2="15" y2="21" stroke="currentColor" stroke-width="2"/>
                    <line x1="3" y1="9" x2="21" y2="9" stroke="currentColor" stroke-width="2"/>
                    <line x1="3" y1="15" x2="21" y2="15" stroke="currentColor" stroke-width="2"/>
                </svg>
                <span>CERTIFICATIONS</span>
            </div>
            <div id="tab-personal" class="gal-tab" onclick="switchTab('personal')" title="Show Personal Life Gallery">
                <svg class="gal-tab-icon" viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10" />
                    <circle cx="12" cy="10" r="3" />
                    <path d="M6 19c1.5-3 4.5-5 6-5s4.5 2 6 5" />
                </svg>
                <span>PERSONAL LIFE</span>
            </div>
        </div>

        <!-- 🖼️ Tab 1 Content: Certifications Grid -->
        <div id="grid-certifications" class="gal-grid grid-tab-content">
            <!-- Post 1: NC CSS -->
            <div class="gal-post" onclick="openLightbox(0)" style="--delay: 1;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/aef5da33-02a4-430a-b6ee-3c7b884ba644.jpg" alt="National Certificate in Computer Systems Servicing" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">🎓 TESDA — NC II</span>
                            <span class="overlay-cert-date">September 27, 2024</span>
                        </div>
                        <h4 class="gal-post-hover-title">National Certificate in Computer Systems Servicing</h4>
                    </div>
                </div>
            </div>

            <!-- Post 2: IoT Smart Automation -->
            <div class="gal-post" onclick="openLightbox(1)" style="--delay: 2;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/88eb5415-5f17-492e-9b76-6f7b2835f2d2.jpg" alt="IoT Integration and Smart Automation Workshop" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">💡 DICT — Workshop</span>
                            <span class="overlay-cert-date">February 15, 2026</span>
                        </div>
                        <h4 class="gal-post-hover-title">IoT Integration and Smart Automation Workshop</h4>
                    </div>
                </div>
            </div>

            <!-- Post 3: Load Balancing -->
            <div class="gal-post" onclick="openLightbox(2)" style="--delay: 3;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/86e4ab65-80a0-43c9-b7b6-014f11cf0085.jpg" alt="Mastering Load Balancing" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">🌐 Network Systems Council</span>
                            <span class="overlay-cert-date">March 16, 2025</span>
                        </div>
                        <h4 class="gal-post-hover-title">Mastering Load Balancing: Strategies for Scalable, Resilient &amp; High Performance Systems</h4>
                    </div>
                </div>
            </div>

            <!-- Post 4: Computer Servicing NC II -->
            <div class="gal-post" onclick="openLightbox(3)" style="--delay: 4;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/7c8c5cb1-d8c3-4a3f-aa08-7f5304e2911a.jpg" alt="Computer Servicing System NC II" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">🔧 Talisay City College</span>
                            <span class="overlay-cert-date">March 23, 2025</span>
                        </div>
                        <h4 class="gal-post-hover-title">Empowering Skills in Computer Servicing System NC II</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🖼️ Tab 2 Content: Personal Life Grid (Dynamic, Starts Hidden) -->
        <div id="grid-personal" class="gal-grid grid-tab-content" style="display: none;">
            <!-- Post 1: Hacking / Study session -->
            <div class="gal-post" onclick="openLightbox(0)" style="--delay: 1;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/5afd88de-95ba-449d-b6f2-994b309662f7.jpg" alt="Dedicated Coding Session" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">💻 Home Workspace, Cebu</span>
                            <span class="overlay-cert-date">April 12, 2026</span>
                        </div>
                        <h4 class="gal-post-hover-title">Late Night Hacking &amp; System Analysis</h4>
                    </div>
                </div>
            </div>

            <!-- Post 2: Collaboration / IT Peers -->
            <div class="gal-post" onclick="openLightbox(1)" style="--delay: 2;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/cac163b5-009b-4235-b303-fe069e6e2446.jpg" alt="Tech Collaboration" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">👥 IT Student Summit</span>
                            <span class="overlay-cert-date">May 10, 2026</span>
                        </div>
                        <h4 class="gal-post-hover-title">System Architecture Panel &amp; Collaboration</h4>
                    </div>
                </div>
            </div>

            <!-- Post 3: Study Workspace Balance -->
            <div class="gal-post" onclick="openLightbox(2)" style="--delay: 3;">
                <div class="gal-post-wrapper">
                    <img src="assets/img/51e779da-6f74-488d-bc7e-5a7e0cbcef60.jpg" alt="Academic Workspace Balance" class="gal-post-img">
                    <div class="gal-post-overlay">
                        <div class="gal-overlay-text-info">
                            <span class="overlay-cert-label">🎓 Campus Lab Lounge, Cebu</span>
                            <span class="overlay-cert-date">May 20, 2026</span>
                        </div>
                        <h4 class="gal-post-hover-title">Balancing Academic Life &amp; Workspace Design</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- 🌌 Lightbox Modal Container (Gallery Split Style) -->
<div id="gallery-lightbox" class="lightbox-modal" onclick="closeLightbox()">
    <span class="lightbox-close">&times;</span>
    <div class="lightbox-content-wrapper" onclick="event.stopPropagation()">
        <div class="gal-lightbox-body">
            <div class="gal-lightbox-media">
                <!-- Navigation Arrows inside Lightbox -->
                <button class="lightbox-nav nav-prev" onclick="prevPost(event)" title="Previous (Left ArrowKey)">❮</button>
                <img id="lightbox-img" class="lightbox-image" src="" alt="Full Resolution Certificate">
                <button class="lightbox-nav nav-next" onclick="nextPost(event)" title="Next (Right ArrowKey)">❯</button>
            </div>
            
            <div class="gal-lightbox-sidebar">
                <div class="gal-sidebar-header">
                    <div class="gal-sidebar-avatar">
                        <?php if ($has_avatar): ?>
                            <img src="<?php echo $avatar_img; ?>" alt="IC">
                        <?php else: ?>
                            IC
                        <?php endif; ?>
                    </div>
                    <div class="gal-sidebar-userinfo">
                        <strong>irish_cueva <span class="verified-badge">✔</span></strong>
                        <span id="lightbox-location">Cebu, Philippines</span>
                    </div>
                </div>
                
                <div class="gal-sidebar-caption-area">
                    <div class="gal-sidebar-caption">
                        <strong class="caption-user">irish_cueva</strong> 
                        <span id="lightbox-description">Certificate details...</span>
                    </div>
                    
                    <div class="gal-sidebar-system-note" id="lightbox-system-badge">
                        <span class="note-icon">🛡️</span>
                        <div>
                            <strong>Credentials Verified</strong>
                            <span>This certificate is officially authenticated by professional educational boards.</span>
                        </div>
                    </div>
                </div>
                
                <div class="gal-sidebar-footer">
                    <div class="gal-action-icons">
                        <div class="left-actions">
                            <span id="lightbox-like-btn" class="action-icon" onclick="toggleLike(event)">❤️</span>
                            <span class="action-icon" onclick="sharePost(event)">✈️</span>
                        </div>
                        <span id="lightbox-bookmark-btn" class="action-icon bookmark" onclick="toggleBookmark(event)">🔖</span>
                    </div>
                    <div class="gal-likes-count" id="lightbox-likes-count">
                        Verified by <strong>TESDA</strong> and <strong>recruitment boards</strong>
                    </div>
                    <div class="gal-sidebar-caption-title">
                        <h3 id="lightbox-title">Certificate Title</h3>
                        <p id="lightbox-meta" class="gal-caption-date">Certificate Date</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 🍞 Custom Interactive Toast Notification -->
<div id="gallery-toast" class="gallery-toast">
    <span class="gallery-toast-icon">🔗</span>
    <span class="gallery-toast-message">Shareable link copied to clipboard!</span>
    <div class="gallery-toast-progress"></div>
</div>

<script>
// Tab 1: Certifications Data Array
const certPosts = [
    {
        src: 'assets/img/aef5da33-02a4-430a-b6ee-3c7b884ba644.jpg',
        title: 'National Certificate in Computer Systems Servicing',
        date: 'September 27, 2024',
        desc: 'Verified qualification in computer hardware diagnostics, advanced OS configurations, server setup, and enterprise-level local area network engineering.',
        authority: 'TESDA (Technical Education and Skills Development Authority)',
        location: 'Cebu, Philippines',
        isCertified: true
    },
    {
        src: 'assets/img/88eb5415-5f17-492e-9b76-6f7b2835f2d2.jpg',
        title: 'IoT Integration and Smart Automation Workshop',
        date: 'February 15, 2026',
        desc: 'Hands-on design, development, and programming of smart home hardware interfaces, sensor controls, microcontrollers, and wireless connectivity scripts.',
        authority: 'Department of Information and Communications Technology (DICT)',
        location: 'Manila, Philippines (Remote)',
        isCertified: true
    },
    {
        src: 'assets/img/86e4ab65-80a0-43c9-b7b6-014f11cf0085.jpg',
        title: 'Mastering Load Balancing: Strategies for Scalable, Resilient, and High Performance Systems',
        date: 'March 16, 2025',
        desc: 'Mastery in system high-availability architectures, server cluster orchestration, traffic management systems, and backend failover configurations.',
        authority: 'Network Systems Engineering Council',
        location: 'Cebu City, Philippines',
        isCertified: true
    },
    {
        src: 'assets/img/7c8c5cb1-d8c3-4a3f-aa08-7f5304e2911a.jpg',
        title: 'Empowering Skills in Computer Servicing System NC II',
        date: 'March 23, 2025',
        desc: 'Intensive practical training program validating computer diagnostics, assembly, network system routing protocols, and general technical hardware administration.',
        authority: 'Vocational Training Institution of Cebu',
        location: 'Cebu City, Philippines',
        isCertified: true
    }
];

// Tab 2: Personal Life Data Array (Using the newly uploaded images!)
const personalPosts = [
    {
        src: 'assets/img/5afd88de-95ba-449d-b6f2-994b309662f7.jpg',
        title: 'Late Night Hacking & System Analysis',
        date: 'April 12, 2026',
        desc: 'Sinking deep into algorithm scripts and backend database logic. Late hours are when custom queries run fast, tests pass, and ideas translate cleanly into source code.',
        authority: 'My Study Workspace',
        location: 'Home Workspace, Cebu',
        isCertified: false
    },
    {
        src: 'assets/img/cac163b5-009b-4235-b303-fe069e6e2446.jpg',
        title: 'System Architecture Panel & Collaboration',
        date: 'May 10, 2026',
        desc: 'Participating in dynamic roundtables with peer developers. Exchanging thoughts on low-latency network setups, cloud deployments, and high-availability stacks.',
        authority: 'IT Student Summit',
        location: 'Tech Hub Center',
        isCertified: false
    },
    {
        src: 'assets/img/51e779da-6f74-488d-bc7e-5a7e0cbcef60.jpg',
        title: 'Balancing Academic Life & Workspace Design',
        date: 'May 20, 2026',
        desc: 'Crafting responsive user interfaces while managing server loads in school labs. The life of an IT enthusiast is all about learning, building, and repeating.',
        authority: 'Campus Lab Lounge',
        location: 'Campus Lab Lounge, Cebu',
        isCertified: false
    }
];

let activeTab = 'certifications';
let currentPostIndex = 0;

// Getter to dynamically load active context array
function getActivePosts() {
    return activeTab === 'certifications' ? certPosts : personalPosts;
}

// Switch between tab containers with premium styling toggle
function switchTab(tabName) {
    if (activeTab === tabName) return;
    
    activeTab = tabName;
    
    // Toggles Tab Menus Active States
    const tabCert = document.getElementById('tab-certifications');
    const tabPers = document.getElementById('tab-personal');
    const gridCert = document.getElementById('grid-certifications');
    const gridPers = document.getElementById('grid-personal');
    
    if (tabName === 'certifications') {
        tabCert.classList.add('active');
        tabPers.classList.remove('active');
        gridCert.style.display = 'grid';
        gridPers.style.display = 'none';
    } else {
        tabCert.classList.remove('active');
        tabPers.classList.add('active');
        gridCert.style.display = 'none';
        gridPers.style.display = 'grid';
    }
    
    // Close lightbox if tab changes
    closeLightbox();
}

function openLightbox(index) {
    currentPostIndex = index;
    const posts = getActivePosts();
    const post = posts[index];
    
    const lightbox = document.getElementById('gallery-lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxTitle = document.getElementById('lightbox-title');
    const lightboxMeta = document.getElementById('lightbox-meta');
    const lightboxDesc = document.getElementById('lightbox-description');
    const lightboxLoc = document.getElementById('lightbox-location');
    const systemBadge = document.getElementById('lightbox-system-badge');

    // Populate standard data
    lightboxImg.src = post.src;
    lightboxTitle.textContent = post.title;
    lightboxMeta.textContent = post.date;
    lightboxDesc.textContent = post.desc;
    lightboxLoc.textContent = post.location;
    
    // Display dynamic credential verification seal only for Certifications tab
    if (post.isCertified) {
        systemBadge.style.display = 'flex';
    } else {
        systemBadge.style.display = 'none';
    }
    
    // Sync interactive liked/bookmarked states
    updateInteractiveUI();

    lightbox.classList.add('show');
    document.body.style.overflow = 'hidden'; // Disable scroll under modal
}

function closeLightbox() {
    const lightbox = document.getElementById('gallery-lightbox');
    lightbox.classList.remove('show');
    document.body.style.overflow = 'auto'; // Re-enable scroll
}

// Slideshow controls
function prevPost(event) {
    if (event) event.stopPropagation();
    const posts = getActivePosts();
    let newIndex = currentPostIndex - 1;
    if (newIndex < 0) {
        newIndex = posts.length - 1;
    }
    openLightbox(newIndex);
}

function nextPost(event) {
    if (event) event.stopPropagation();
    const posts = getActivePosts();
    let newIndex = currentPostIndex + 1;
    if (newIndex >= posts.length) {
        newIndex = 0;
    }
    openLightbox(newIndex);
}

// Local Storage backed isolated persistence
function updateInteractiveUI() {
    const likeBtn = document.getElementById('lightbox-like-btn');
    const bookmarkBtn = document.getElementById('lightbox-bookmark-btn');
    const likesCount = document.getElementById('lightbox-likes-count');
    
    const posts = getActivePosts();
    const post = posts[currentPostIndex];

    // Build isolated storage keys for certifications vs personal life
    const likeKey = `${activeTab}_like_${currentPostIndex}`;
    const bookmarkKey = `${activeTab}_bookmark_${currentPostIndex}`;

    const isLiked = localStorage.getItem(likeKey) === 'true';
    const isBookmarked = localStorage.getItem(bookmarkKey) === 'true';

    // Heart Likes UI sync
    if (isLiked) {
        likeBtn.classList.add('liked-active');
        if (post.isCertified) {
            likesCount.innerHTML = `Liked by <strong>you</strong> and <strong>recruitment boards</strong> (Verified by <strong>${post.authority}</strong>)`;
        } else {
            likesCount.innerHTML = `Liked by <strong>you</strong> and <strong>${post.authority}</strong> fans`;
        }
    } else {
        likeBtn.classList.remove('liked-active');
        if (post.isCertified) {
            likesCount.innerHTML = `Verified by <strong>${post.authority}</strong> and <strong>recruitment boards</strong>`;
        } else {
            likesCount.innerHTML = `Shared from <strong>${post.authority}</strong>`;
        }
    }

    // Bookmarks UI sync
    if (isBookmarked) {
        bookmarkBtn.classList.add('bookmarked-active');
    } else {
        bookmarkBtn.classList.remove('bookmarked-active');
    }
}

function toggleLike(event) {
    if (event) event.stopPropagation();
    const key = `${activeTab}_like_${currentPostIndex}`;
    const wasLiked = localStorage.getItem(key) === 'true';
    localStorage.setItem(key, (!wasLiked).toString());
    
    updateInteractiveUI();
}

function toggleBookmark(event) {
    if (event) event.stopPropagation();
    const key = `${activeTab}_bookmark_${currentPostIndex}`;
    const wasBookmarked = localStorage.getItem(key) === 'true';
    localStorage.setItem(key, (!wasBookmarked).toString());
    
    updateInteractiveUI();
}

// Build shareable deep-links referencing current active tab and index
function sharePost(event) {
    if (event) event.stopPropagation();
    
    const shareUrl = `${window.location.origin}${window.location.pathname}?page=portfolio&tab=${activeTab}&item=${currentPostIndex}`;
    
    navigator.clipboard.writeText(shareUrl).then(() => {
        showToast('🔗 Shareable post link copied to clipboard!');
    }).catch(err => {
        showToast('❌ Failed to copy link to clipboard');
    });
}

function showToast(message) {
    const toast = document.getElementById('gallery-toast');
    const messageSpan = toast.querySelector('.gallery-toast-message');
    
    messageSpan.textContent = message;
    
    toast.classList.remove('show');
    void toast.offsetWidth; // Trigger reflow
    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
    }, 3000);
}

// Accessibility Keydown listeners
document.addEventListener('keydown', function(event) {
    const lightbox = document.getElementById('gallery-lightbox');
    if (!lightbox.classList.contains('show')) return;

    if (event.key === 'Escape') {
        closeLightbox();
    } else if (event.key === 'ArrowLeft') {
        prevPost(event);
    } else if (event.key === 'ArrowRight') {
        nextPost(event);
    }
});

// Support Deep-linking on initial pageload (Reads url search params)
window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');
    const itemParam = urlParams.get('item');
    
    if (tabParam !== null) {
        if (tabParam === 'certifications' || tabParam === 'personal') {
            switchTab(tabParam);
            
            if (itemParam !== null) {
                const index = parseInt(itemParam, 10);
                const posts = getActivePosts();
                if (!isNaN(index) && index >= 0 && index < posts.length) {
                    setTimeout(() => {
                        openLightbox(index);
                    }, 300);
                }
            }
        }
    }
});
</script>

<?php include 'includes/footer.php'; ?>
