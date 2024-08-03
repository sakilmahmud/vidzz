
    <!-- Footer -->
    <footer>
        <!-- Add your footer content here -->
        <div class="container">
            <p>&copy; 2023 Aayan Pharmacy. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById("mobile-toggle-button").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("open");
            document.getElementById("mobile-menu-overlay").classList.toggle("active");
        });

        // Mobile menu close button
        document.getElementById("mobile-close-button").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.remove("open");
            document.getElementById("mobile-menu-overlay").classList.remove("active");
        });

    </script>
    <script>
        $(document).ready(function() {
            $('#banner-carousel').carousel();
            $('#offer-carousel').carousel();
        });
    </script>
</body>
</html>