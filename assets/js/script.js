let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

let section = document.querySelectorAll('section');
let navLinks = document.querySelectorAll('header .navbar a');

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');

    section.forEach(sec =>{

      let top = window.scrollY;
      let height = sec.offsetHeight;
      let offset = sec.offsetTop - 150;
      let id = sec.getAttribute('id');

      if(top => offset && top < offset + height){
        navLinks.forEach(links =>{
          links.classList.remove('active');
          document.querySelectorAll('header .navbar a[href*='+id+']').classList.add('active');
        });
      };
    });
}


document.querySelector('#search-icon').onclick = () =>{
    document.querySelector('#search-form').classList.toggle('active');
}

document.querySelector('#close').onclick = () =>{
    document.querySelector('#search-form').classList.remove('active');
}

var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 7500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop: true,
  });

  function loader(){
    document.querySelector('.loader-container').classList.add('fade-out');
  }

  function fadeOut(){
    setInterval(loader, 3000);
  }

  window.onload = fadeOut;

  // Fungsi untuk menambahkan ulasan baru
function submitReview() {
  const reviewText = document.getElementById('review-input').value;
  const reviewerName = document.getElementById('name-input').value;
  const ratingStars = document.querySelectorAll('.rating span');
  let ratingValue = Array.from(ratingStars).filter(star => star.classList.contains('active')).length;

  if (!reviewText || !reviewerName || ratingValue === 0) {
      alert("Please fill out all fields and provide a rating.");
      return;
  }

  // Membuat elemen ulasan baru
  const reviewCard = document.createElement('div');
  reviewCard.className = 'review-card';

  reviewCard.innerHTML = `
      <img src="path-to-profile-pic.jpg" alt="user profile">
      <div class="review-content">
          <h3>${reviewerName}</h3>
          <div class="rating">${'⭐'.repeat(ratingValue)}</div>
          <p>${reviewText}</p>
          <div class="like-dislike-buttons">
              <button class="like-btn" onclick="likeReview(this)">Like</button>
              <button class="dislike-btn" onclick="dislikeReview(this)">Dislike</button>
          </div>
      </div>
  `;

  // Menambahkan ulasan baru ke daftar ulasan
  document.getElementById('review-list').prepend(reviewCard);

  // Reset input
  document.getElementById('review-input').value = '';
  document.getElementById('name-input').value = '';
  ratingStars.forEach(star => star.classList.remove('active'));
}

// Mengatur bintang yang di-hover atau di-klik
const ratingStars = document.querySelectorAll('.rating span');

// Menambahkan efek hover untuk menyorot bintang saat kursor berada di atasnya
ratingStars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
        highlightStars(index);
    });

    star.addEventListener('mouseout', () => {
        resetStars();
    });

    star.addEventListener('click', () => {
        setRating(index);
    });
});

// Fungsi untuk menyorot bintang hingga indeks yang di-hover
function highlightStars(index) {
    ratingStars.forEach((star, i) => {
        star.classList.toggle('hovered', i <= index);
    });
}

// Fungsi untuk menghilangkan efek sorotan hover ketika kursor keluar
function resetStars() {
    ratingStars.forEach(star => {
        star.classList.remove('hovered');
    });
}

// Fungsi untuk mengatur nilai rating berdasarkan jumlah bintang yang di-klik
function setRating(index) {
    ratingStars.forEach((star, i) => {
        star.classList.toggle('active', i <= index);
    });
}

// Fungsi untuk memberi like pada ulasan
function likeReview(button) {
  button.textContent = 'Liked';
  button.style.backgroundColor = '#2ecc71';
}

// Fungsi untuk memberi dislike pada ulasan
function dislikeReview(button) {
  button.textContent = 'Disliked';
  button.style.backgroundColor = '#c0392b';
}

// Fungsi untuk memberikan rating (event listener untuk setiap bintang)
document.querySelectorAll('.rating span').forEach((star, index) => {
  star.addEventListener('click', () => {
      document.querySelectorAll('.rating span').forEach((s, i) => {
          s.classList.toggle('active', i <= index);
      });
  });
});

// Mendapatkan elemen tombol
const likeBtn = document.getElementById('likeBtn');
const dislikeBtn = document.getElementById('dislikeBtn');

// Menambahkan event listener untuk tombol Like
likeBtn.addEventListener('click', function() {
    // Toggle status active untuk tombol Like
    if (likeBtn.classList.contains('active')) {
        likeBtn.classList.remove('active'); // Menghilangkan status aktif
    } else {
        likeBtn.classList.add('active'); // Menambah status aktif
        dislikeBtn.classList.remove('active'); // Memastikan tombol Dislike tidak aktif
    }
});

// Menambahkan event listener untuk tombol Dislike
dislikeBtn.addEventListener('click', function() {
    // Toggle status active untuk tombol Dislike
    if (dislikeBtn.classList.contains('active')) {
        dislikeBtn.classList.remove('active'); // Menghilangkan status aktif
    } else {
        dislikeBtn.classList.add('active'); // Menambah status aktif
        likeBtn.classList.remove('active'); // Memastikan tombol Like tidak aktif
    }
});