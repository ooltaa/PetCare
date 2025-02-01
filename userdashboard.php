<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php"); 
    exit();
}
$user_name = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'User';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Pawfect Friends</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    
  <div class="main">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">PetCare</h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about us">About Us</a></li>
                <li><a href="#store">Store</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="Logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="text-container">
        <h1>Welcome, <span><?php echo htmlspecialchars($user_name); ?></span>!</h1>
            <h1><span>Pet</span>Lover</h1>
            <p class="par"><h2>When your pet is healthy and happy, you are happy too!</h2></p>
            <p><h3>They love you their entire life, you love them just in one part of your life.</h3></p>
        </div>
    </div>
</div>

<section id="about" class="section">
  <div class="about-us-section">
      <div class="about-us-content-wrapper">
          <div class="about-us-text">
              <h1 class="about-us-header">ABOUT US</h1>
              <div class="divider"></div>
              <div class="about-us-content">
                  <p>
                      Welcome to <strong>PetCare</strong>, where your pets’ happiness and well-being are our top priority. We are a dedicated team of pet lovers committed to providing exceptional care for your furry friends. Our studio offers a range of services designed to make your pets look and feel their best, from grooming and pampering treatments to fun activities that brighten their day.
                  </p>
                  <p>
                      We understand that pets are family, and we treat every animal with the love and respect they deserve. Our experienced team works with pets of all kinds, ensuring that each one receives personalized attention and care. Whether it’s a refreshing bath, a new haircut, or simply some quality playtime, we’re here to help your pet feel like royalty.
                  </p>
                  <p>
                      Beyond caring for pets in our studio, we are also passionate about giving back to the community. We actively support stray and abandoned dogs by providing them with food, shelter, and the care they need. Every pet deserves a chance at happiness, and we are dedicated to making sure even those without homes are given the love and support they deserve.
                  </p>
                  <p>
                      At our studio, we also offer a wide variety of pet products, from toys and treats to grooming tools and accessories. Whether you're looking for something special for your pet or a thoughtful gift, we have a carefully curated selection of high-quality items that both pets and owners will love.
                  </p>
                  <p>
                      Join us at PetCare where pet care meets passion, and every tail wags with joy!
                  </p>
              </div>
          </div>
          <div class="about-us-slider">
              <div class="slider-container">
                  <div class="slider" id="slider">
                      <div class="slide">
                          <img src="https://cdn.secura.net/dims4/default/7cee611/2147483647/strip/true/crop/2000x1333+0+0/resize/845x563!/quality/90/?url=https%3A%2F%2Fk2-prod-secura.s3.us-east-1.amazonaws.com%2Fbrightspot%2F83%2Feb%2F44858e644dd7801b6a05fb40d936%2Fpet-care-business-safety-tips.jpg" alt="Image 1">
                      </div>
                      <div class="slide">
                          <img src="https://www.gingrapp.com/hs-fs/hubfs/Simplify%20%26%20Save-%20Gingrs%20Pet-Care%20Packages%20%26%20Subscriptions.jpg?width=450&height=450&name=Simplify%20%26%20Save-%20Gingrs%20Pet-Care%20Packages%20%26%20Subscriptions.jpg" alt="Image 2">
                      </div>
                      <div class="slide">
                          <img src="https://www.ibpsa.com/wp-content/uploads/2024/01/Holistic-Pet-Care-IBPSA.jpg" alt="Image 3">
                      </div>
                      <div class="slide">
                          <img src="https://www.qcpetstudies.com/blog/wp-content/uploads/2021/10/How-to-start-your-own-pet-care-business-in-post-image-1.jpg" alt="Image 4">
                      </div>
                      <div class="slide">
                          <img src="https://images.squarespace-cdn.com/content/v1/611b3a86fb6a226aadffcf79/1701413262131-EJ9905KO6CKUCJVTJVJ5/Affordable+Pet+Care+Tips+1.jpg?format=500w" alt="Image 5">
                      </div>
                  </div>
                  <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                  <button class="next" onclick="moveSlide(1)">&#10095;</button>
              </div>
          </div>
      </div>
  </div>
</section>
<section id="store" class="store-section">
    <div class="store-header">
        <h2>Our Pet Store</h2>
        <p>Find the best products for your furry friends! From toys to grooming essentials, we have it all.</p>
    </div>

    <div class="product-grid">
        <div class="product-item">
            <img src="https://target.scene7.com/is/image/Target/GUEST_f2fe38d0-8f47-4d16-9b17-af9c0a9e065f?wid=488&hei=488&fmt=pjpeg" alt="Dog Toy">
            <div class="product-info">
                <h3>Dog Toy</h3>
                <p>Durable and fun toy for your dog.</p>
                <p class="price">$10.99</p>

                <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Dog Toy">
                    <input type="hidden" name="product_price" value="10.99">
                    <input type="hidden" name="product_image" value="https://target.scene7.com/is/image/Target/GUEST_f2fe38d0-8f47-4d16-9b17-af9c0a9e065f?wid=488&hei=488&fmt=pjpeg">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
            </div>
        </div>
        <div class="product-item">
            <img src="https://ip.prod.freshop.retail.ncrcloud.com/resize?url=https://images.freshop.ncrcloud.com/00023100107318/c21a098349ade0e5ab8dec9e0592e570_large.png&width=512&type=webp&quality=90" alt="Dog Food">
            <div class="product-info">
                <h3>Dog Food</h3>
                <p>High-quality food for your dog's nutrition.</p>
                <p class="price">$25.99</p>

                <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Dog Food">
                    <input type="hidden" name="product_price" value="25.99">
                    <input type="hidden" name="product_image" value="https://ip.prod.freshop.retail.ncrcloud.com/resize?url=https://images.freshop.ncrcloud.com/00023100107318/c21a098349ade0e5ab8dec9e0592e570_large.png&width=512&type=webp&quality=90">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
            </div>
        </div>
        <div class="product-item">
            <img src="https://kindtail.com/cdn/shop/files/PINKLOUNGER-min_1200x.jpg?v=1709603766" alt="Pet Bed">
            <div class="product-info">
                <h3>Dog Bed</h3>
                <p>Comfortable bed for a peaceful rest.</p>
                <p class="price">$49.99</p>

                <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Dog Bed">
                    <input type="hidden" name="product_price" value="49.99">
                    <input type="hidden" name="product_image" value="https://kindtail.com/cdn/shop/files/PINKLOUNGER-min_1200x.jpg?v=1709603766">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
            </div>
        </div>
        <div class="product-item">
          <img src="https://www.bellsandwhiskers.co.uk/wp-content/uploads/2023/07/OldGreenPuppySet.webp">
          <div class="product-info">
              <h3>Leash & Collar</h3>
              <p>Stylish and strong leash and collar set.</p>
              <p class="price">$19.99</p>

              <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Leash & Collar">
                    <input type="hidden" name="product_price" value="19.99">
                    <input type="hidden" name="product_image" value="https://www.bellsandwhiskers.co.uk/wp-content/uploads/2023/07/OldGreenPuppySet.webp">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
          </div>
      </div>
      <div class="product-item">
        <img src="https://s7d2.scene7.com/is/image/PetSmart/5325497?fmt=webp&wid=400&hei=400">
        <div class="product-info">
            <h3>Cat toy</h3>
            <p>Durable and fun toy for your cat.</p>
            <p class="price">$12.99</p>

            <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Cat toy">
                    <input type="hidden" name="product_price" value="12.99">
                    <input type="hidden" name="product_image" value="https://s7d2.scene7.com/is/image/PetSmart/5325497?fmt=webp&wid=400&hei=400">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
        </div>
    </div>
    <div class="product-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWJZ7osjrRmoWNuzpI2-VPAUkvXbdqCnfHJw&s">
      <div class="product-info">
          <h3>Cat Food</h3>
          <p>High-quality food for your cat' nutrition.</p>
          <p class="price">$28.99</p>

          <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Cat food">
                    <input type="hidden" name="product_price" value="28.99">
                    <input type="hidden" name="product_image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSWJZ7osjrRmoWNuzpI2-VPAUkvXbdqCnfHJw&s">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
      </div>
  </div>
  <div class="product-item">
    <img src="https://assets.petco.com/petco/image/upload/f_auto,q_auto/l_bypetco-badge,fl_relative,w_0.20,g_south_east,e_sharpen/2897122-center-1">
    <div class="product-info">
        <h3>Cat Bed</h3>
        <p>Comfortable bed for a peaceful rest.</p>
        <p class="price">$55.99</p>

        <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Cat Bed">
                    <input type="hidden" name="product_price" value="55.99">
                    <input type="hidden" name="product_image" value="https://assets.petco.com/petco/image/upload/f_auto,q_auto/l_bypetco-badge,fl_relative,w_0.20,g_south_east,e_sharpen/2897122-center-1">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
    </div>
</div>
<div class="product-item">
  <img src="https://www.nnyeo.com/cdn/shop/files/BabaNavyCatCollar_1024x1024.jpg?v=1694096194">
  <div class="product-info">
      <h3>Collar</h3>
      <p>Stylish and strong collar.</p>
      <p class="price">$19.99</p>

      <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Collar">
                    <input type="hidden" name="product_price" value="19.99">
                    <input type="hidden" name="product_image" value="https://www.nnyeo.com/cdn/shop/files/BabaNavyCatCollar_1024x1024.jpg?v=1694096194">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
  </div>
</div>
<div class="product-item">
  <img src="https://m.media-amazon.com/images/I/71+gyVxYlyL.jpg">
  <div class="product-info">
      <h3>Dog and cat grooming brushe.</h3>
      <p>A very soft and useful brushe.</p>
      <p class="price">$13.99</p>

      <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Dog and cat grooming brushe">
                    <input type="hidden" name="product_price" value="13.99">
                    <input type="hidden" name="product_image" value="https://m.media-amazon.com/images/I/71+gyVxYlyL.jpg">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
  </div>
</div>
<div class="product-item">
  <img src="https://wahlusa.com/media/catalog/product/0/9/09281-210_-_pet_pro.pt01_2.jpg?optimize=medium&fit=bounds&height=700&width=700&canvas=700:700">
  <div class="product-info">
      <h3>Clipper kit.</h3>
      <p>For a beautiful sytle.</p>
      <p class="price">$19.99</p>

      <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Clipper kit">
                    <input type="hidden" name="product_price" value="19.99">
                    <input type="hidden" name="product_image" value="https://wahlusa.com/media/catalog/product/0/9/09281-210_-_pet_pro.pt01_2.jpg?optimize=medium&fit=bounds&height=700&width=700&canvas=700:700">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
  </div>
</div>
<div class="product-item">
  <img src="https://freshlybailey.com/cdn/shop/files/01_c7e5a5b8-6080-4703-97a3-924de59605a7.jpg?v=1697650252&width=1920">
  <div class="product-info">
      <h3>Groomin scissors for pets.</h3>
      <p>Fast and a happy cut.</p>
      <p class="price">$10.99</p>
      
      <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Groomin scissors for pets">
                    <input type="hidden" name="product_price" value="10.99">
                    <input type="hidden" name="product_image" value="https://freshlybailey.com/cdn/shop/files/01_c7e5a5b8-6080-4703-97a3-924de59605a7.jpg?v=1697650252&width=1920">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
  </div>
</div>
<div class="product-item">
  <img src="https://headsupfortails.com/cdn/shop/files/8906179171058.jpg?v=1719828998">
  <div class="product-info">
      <h3>Shampoo for Dogs and Cats.</h3>
      <p>Fresh and Clean.</p>
      <p class="price">$9.99</p>

      <form action="checkout.php" method="POST">
                    <input type="hidden" name="product_name" value="Shampoo for Dogs and Cats.">
                    <input type="hidden" name="product_price" value="9.99">
                    <input type="hidden" name="product_image" value="https://headsupfortails.com/cdn/shop/files/8906179171058.jpg?v=1719828998">
                    <button type="submit" name="buy_product" class="buy-btn">Buy Now</button>
                </form>
  </div>
</div>
      </section>
    </div>
    <div class="footer">
      <div class="footer-content">
          <div class="contact-info">
              <h3>Contact Us</h3>
              <p><strong>Phone:</strong> +38345206948</p>
              <p><strong>Location:</strong> Lakrisht, 10000 Prishtine, Kosovo</p>
          </div>
  
          <div class="about-site">
              <h3>About this site</h3>
              <div class="social-links">
                  <a href="https://www.instagram.com" target="_blank" class="social-icon instagram">Instagram</a>
                  <a href="https://www.facebook.com" target="_blank" class="social-icon facebook">Facebook</a>
                  <a href="https://www.twitter.com" target="_blank" class="social-icon twitter">Twitter</a>
              </div>
          </div>
      </div>
      <div class="footer-bottom">
          <p>&copy; 2025 PetCare. All Rights Reserved.</p>
      </div>
  </div>
  
    <script src="script.js"></script>
</body>
</html>