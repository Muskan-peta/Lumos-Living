<?php
session_start();

// If the user is logged in, show the homepage with the username
if (isset($_SESSION['user'])) {
  $user_name = $_SESSION['user'];  // Store the user's name in a variable
} else {
  $user_name = null;  // Set as null if the user is not logged in
}
?>
<?php
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php'; // Include Composer's autoloader

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // Validate input
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
  }

  // Create a new PHPMailer instance
  $mail = new PHPMailer(true);

  try {
    // Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                  // Enable SMTP authentication
    $mail->Username   = 'abc';              // SMTP username
    $mail->Password   = 'xyz';                // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also available
    $mail->Port       = 587;                                   // TCP port to connect to

    // Recipients
    $mail->setFrom('abc', 'Contact Us');
    $mail->addAddress('def', 'name'); // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Test Contact Form';
    $mail->Body    = "<p><strong>Name:</strong> {$name}</p>
                          <p><strong>Email:</strong> {$email}</p>
                          <p><strong>Message:</strong><br>{$message}</p>";

    $mail->send();
    // Redirect after successful email send
    header('Location: index.php?status=success');
    exit;
  } catch (Exception $e) {
    header('Location: index.php?status=error');
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interior Designer</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <!--
  <h1>Welcome to the Index Page</h1>
  <?php if ($user_name): ?>
    <p>You are logged in as: <strong><?php echo htmlspecialchars($user_name); ?></strong></p>
  <?php else: ?>
    <p>You are not logged in. Please <a href="login_form.php">Login</a>.</p>
  <?php endif; ?>
  -->

  <!--Header Section-->
  <header class="header">
    <div class="container">
      <!--Logo Section-->
      <div class="logo">
        <img src="Assets/Website Logo.png">
      </div>

      <!--Site name and nav links-->
      <div class="site-navigation">
        <h1 class="site-name">LUMOS LIVING</h1>
        <nav>
          <ul class="nav-links">
            <li><a href="#aboutus">About Us</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="#">Reviews</a></li>
            <li><a href="designtips.html">Design Tips</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#faq">FAQs</a></li>
          </ul>
        </nav>
      </div>
      <!--Search bar and Login section-->
      <div class="right-side">
        <form action="search.php" method="GET" class="search-form">
          <input type="text" name="query" placeholder="Search for products..." class="search-bar" required>
          <button type="submit" class="search-btn">Search</button>
        </form>
        <?php if (!$user_name): ?>
          <a href="login_form.php" class="login-btn">Login</a>
        <?php else: ?>
          <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
          <a href="logout.php" class="login-btn">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <!-- Slider Section with Static Text -->
  <section class="hero">
    <div class="slider-container">
      <div class="slider">
        <!-- Slide 1 -->
        <div class="slide">
          <img src="Assets/Homedesign.png" alt="Home Design" />
        </div>
        <!-- Slide 2 -->
        <div class="slide">
          <img src="Assets/2.png" alt="Interior Design 2" />
        </div>
        <!-- Slide 3 -->
        <div class="slide">
          <img src="Assets/3.png" alt="Interior Design 3" />
        </div>
        <!-- Slide 4 -->
        <div class="slide">
          <img src="Assets/4.png" alt="Interior Design 4" />
        </div>
      </div>
    </div>

    <div class="text-overlay">
      <h2>Welcome to our<br />Interior Design Studio</h2>
      <h4>Designs that Inspire</h4>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="aboutus" class="about">
    <div class="about-content">
      <img src="Assets/about us.png" alt="About Us" />
      <div class="about-text">
        <h2>ABOUT US</h2>
        <p>
          Our interior design studio focuses on transforming your spaces into aesthetic, comfortable, and practical
          environments.
          Whether its modern, minimalism or timeless classics, we blend creativity and innovation to meet your unique
          needs.
          Let us bring your dream home to life with thoughtful designs that inspire and elevate everyday living.
        </p>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio" class="portfolio">
    <h1>PORTFOLIO</h1>
    <h4>Dream. Create. Live</h4>
    <a href="portfolio.html" target="_blank" rel="noopener noreferrer">
      <h5>Explore</h5>
    </a>
    <div class="portfolio-gird">
      <div class="portfolio-item">
        <img src="Assets/Living Room.png" alt="Residential Space">
        <a href="portfolio.html#residential" target="_blank" rel="noopener noreferrer">
          <h3>Residential Design</h3>
        </a>
      </div>
      <div class="portfolio-item">
        <img src="Assets/Office Space.png" alt="Office Space">
        <a href="portfolio.html#office" target="_blank" rel="noopener noreferrer">
          <h3>Office Design</h3>
        </a>
      </div>
      <div class="portfolio-item">
        <img src="Assets/Sketching.png" alt="Conceptual Designs">
        <a href="portfolio.html#sketch" target="_blank" rel="noopener noreferrer">
          <h3>Conceptual Design</h3>
        </a>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="section">
    <h2>Contact Us</h2>
    <p>Email: <a href="mailto:lumosliving@gmail.com">lumosliving@gmail.com</a></p>
    <p>Phone: <a href="tel:+1234567890">(123) 456-7890</a></p>
    <p>Address: 123 Design Street, City, Country</p>
    <?php
    // Display status messages only once
    if (isset($_GET['status'])) {
      if ($_GET['status'] === 'success') {
        echo "<p>Message sent successfully!</p>";
      } elseif ($_GET['status'] === 'error') {
        echo "<p>There was an error sending your message. Please try again.</p>";
      }
    }
    ?>
    <form action="index.php" method="POST">
      <label for="name">Name:</label><br />
      <input type="text" id="name" class=" form-control mt-4" name="name" placeholder="Your Name" required /><br />

      <label for="email">Email:</label><br />
      <input type="email" id="email" class=" form-control mt-4" name="email" placeholder="Your Email" required /><br />

      <label for="message">Message:</label><br />
      <textarea id="message" name="message" class=" form-control mt-4" rows="5" placeholder="Your Message" required></textarea><br /><br />

      <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
  </section>

  <!-- FAQs Section -->
  <section id="faq" class="section">
    <h2>FREQUENTLY ASKED QUESTIONS</h2>
    <h3>1. What services do you offer?</h3>
    <p>We provide a range of interior design services including space planning, color consultation, furniture selection, and custom design solutions for residential and commercial projects.</p>
    <h3>2. How does the design process work?</h3>
    <p>Our process begins with a consultation to understand your needs. We then create a design plan, which includes mood boards, layouts, and product suggestions, followed by implementation.</p>
    <h3>3. How long does a typical project take?</h3>
    <p>Project timelines vary based on scope, but most designs take between 4 to 8 weeks. We’ll provide a detailed timeline after the initial consultation.</p>
    <h3>4. Can I see examples of your previous work?</h3>
    <p>Yes, you can explore our portfolio in the Gallery section, where we showcase completed projects and client testimonials.</p>
  </section>

  <!-- Footer Section -->
  <footer class="footer">
    <div class="container">
      <p>&copy; 2024 Lumos Living</p>
    </div>
  </footer>

</body>

</html>
