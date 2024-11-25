<!-- Footer -->
<footer class="footerWrap">
  <div class="footerContent">
    <p>&copy; 2024 Golden Bites. All Rights Reserved.</p>
    <p>Email: <a href="mailto:contact@goldenbites.com">contact@goldenbites.com</a></p>
    <p>Phone number: 250 250 250</p>
    <div class="socialLinks">
      <a href="https://www.facebook.com" target="_blank" class="socialIcon" aria-label="Facebook">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.twitter.com" target="_blank" class="socialIcon" aria-label="Twitter">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.instagram.com" target="_blank" class="socialIcon" aria-label="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
    </div>
  </div>
</footer>

<!-- Font Awesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


</body>
</html>

<style>
/* Footer Styling */
.footerWrap {
  background-color: #212f54;
  color: #fff;
  padding: 1.5rem 1.5rem;
  text-align: center;
  border-top: 1px solid #e0e5eb;
  box-shadow: 0px -1px 8px #223055;
}

.footerContent p,
.footerContent a {
  font-size: 1rem;
  color: #fff;
  margin: 0.5rem 0;
  text-decoration: none;
  transition: color 0.2s ease-in-out;
}

.footerContent a:hover {
  color: #36bae6;
}

.socialLinks {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-top: 1rem;
}

.socialIcon {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 50px;
  height: 50px;
  color: #fff;
  font-size: 24px;
  background-color: #223054;
  border-radius: 50%;
  box-shadow: 0 0 5px #13b1e7;
  text-decoration: none;
  transition: all 0.3s ease;
}

.socialIcon:hover {
  background-color: #13b1e7;
  color: #223054;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .footerContent {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  

}


</style>