document.addEventListener('DOMContentLoaded', function() {
    // Animasi scroll ke hasil
    if (window.location.search.includes('result=success')) {
        setTimeout(function() {
            const resultContainer = document.querySelector('.result-container');
            if (resultContainer) {
                resultContainer.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Tambah animasi
                resultContainer.style.animation = 'fadeInUp 0.5s ease-out';
            }
        }, 300);
    }
    
    // Animasi form
    const form = document.querySelector('.flight-form');
    if (form) {
        form.style.opacity = '0';
        form.style.transform = 'translateY(20px)';
        form.style.transition = 'all 0.5s ease-out';
        
        setTimeout(function() {
            form.style.opacity = '1';
            form.style.transform = 'translateY(0)';
        }, 200);
    }
});

// Tambahkan style animasi secara dinamis
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);