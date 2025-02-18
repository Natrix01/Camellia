        // Function to open modal with animation
        function openModal(modalId) {
            let modal = document.getElementById(modalId);
            let modalContent = modal.querySelector('.modal-content');

            modal.classList.add("active");
            setTimeout(() => {
                modalContent.classList.add("active");
            }, 100);
        }

        // Function to close modal with animation
        function closeModal(modalId) {
            let modal = document.getElementById(modalId);
            let modalContent = modal.querySelector('.modal-content');

            modalContent.classList.remove("active");
            setTimeout(() => {
                modal.classList.remove("active");
            }, 300);
        }

        // Event Listeners for buttons
        document.getElementById("registerBtn").addEventListener("click", function() {
            openModal("registerModal");
        });

        document.getElementById("loginBtn").addEventListener("click", function() {
            openModal("loginModal");
        });

        document.getElementById("registerBtn").addEventListener("click", function () {
            document.getElementById("registerModal").style.display = "block";
        });
        
        document.getElementById("loginBtn").addEventListener("click", function () {
            document.getElementById("loginModal").style.display = "block";
        });
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        document.addEventListener("DOMContentLoaded", function () {
            // Select all navigation links
            const navLinks = document.querySelectorAll(".navbar nav a");
        
            // Add click event listener for smooth scrolling
            navLinks.forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault(); // Prevent default anchor behavior
        
                    const targetId = this.getAttribute("href").substring(1); // Get target section ID
                    const targetSection = document.getElementById(targetId);
        
                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - 50, // Adjust for header height if necessary
                            behavior: "smooth"
                        });
                    }
                });
            });
        });
          

        document.getElementById("registerBtn").addEventListener("click", function() {
            document.getElementById("registerModal").style.display = "block";
        });
        
        document.getElementById("loginBtn").addEventListener("click", function() {
            document.getElementById("loginModal").style.display = "block";
        });
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        