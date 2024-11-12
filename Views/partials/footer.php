<footer class="footerWrap">
  <div class="footerContent">
    <p>&copy; 2024 Golden Bites. All Rights Reserved.</p>
    <p>Email: <a href="mailto:contact@goldenbites.com">contact@goldenbites.com</a></p>
    <p>Phome number: 250 250 250</p>
    <div class="socialLinks">
      <a href="https://www.facebook.com" target="_blank" class="socialIcon">Facebook</a>
      <a href="https://www.twitter.com" target="_blank" class="socialIcon">Twitter</a>
      <a href="https://www.instagram.com" target="_blank" class="socialIcon">Instagram</a>
    </div>
  </div>
</footer>


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
  color: #fff;
  padding: 0.5rem;
  background-color: #223054;
  border-radius: 5px;
  box-shadow: 0 0 5px #13b1e7;
  text-decoration: none;
  font-size: 0.9rem;
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
  
  .socialLinks {
    flex-direction: column;
    gap: 0.5rem;
  }
}


</style>