// Confirm delete
function confirmDelete() {
    return confirm("Are you sure you want to delete this item? This action cannot be undone.");
}

// Confirm logout
function confirmLogout() {
    return confirm("Are you sure you want to logout?");
}

// Simple form validation for comments (client-side)
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.copyright-year').forEach(function (el) {
        el.textContent = new Date().getFullYear();
    });

    const commentForm = document.querySelector('.comment-form form');
    if (commentForm) {
        commentForm.addEventListener('submit', function(e) {
            const name = document.getElementById('name');
            const comment = document.getElementById('comment');
            
            if (!name.value.trim()) {
                e.preventDefault();
                alert('Please enter your name');
                name.focus();
                return false;
            }
            
            if (!comment.value.trim()) {
                e.preventDefault();
                alert('Please enter your comment');
                comment.focus();
                return false;
            }
        });
    }
});