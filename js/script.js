const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('.nav-links');
  const logoLink = document.querySelector('.logo a'); // Select the logo link by class
  const scrollDuration = 500; // Adjust scroll duration as needed
  const navLinks = document.querySelectorAll('.nav-links li'); // Select all navigation links

  burger.addEventListener('click', () => {
    // Toggle Nav
    nav.classList.toggle('nav-active');

    // Burger Animation
    burger.classList.toggle('toggle');
  });

  // Scroll to top when the logo is clicked
  logoLink.addEventListener('click', (e) => {
    window.location.href = '#home';

    const startPosition = window.pageYOffset;
    const targetPosition = 0;
    const distance = targetPosition - startPosition;
    const startTime = performance.now();

    function scrollAnimation(currentTime) {
      const timeElapsed = currentTime - startTime;
      const run = ease(timeElapsed, startPosition, distance, scrollDuration);
      window.scrollTo(0, run);

      if (timeElapsed < scrollDuration) {
        requestAnimationFrame(scrollAnimation);
      }
    }

    function ease(t, b, c, d) {
      // Easing function for smooth scrolling (you can use a library for this)
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t + b;
      t--;
      return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(scrollAnimation);
  });

  // Prevent context menu on long-press for logo link
  logoLink.addEventListener('contextmenu', (e) => {
    e.preventDefault();
  });

  // Smooth Scroll to Sections
  navLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const target = document.querySelector(link.querySelector('a').getAttribute('href'));
      const offsetTop = target.offsetTop;

      window.scrollTo({
        top: offsetTop,
        behavior: 'smooth',
      });

      nav.classList.remove('nav-active'); // Close the menu when a nav link is clicked
    });
  });
};

navSlide();




function preloaderBlock() {
  function a(a) {
    a.preventDefault();
  }
  var b = document.querySelector(".preloader");
  Hamster(b).wheel(a, false);
}

function reveal() {
  var reveals = document.querySelectorAll('.reveal');

  for (var i = 0; i < reveals.length; i++) {
    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 150;

    if (revealtop < windowheight - revealpoint) {
      reveals[i].classList.add('active');
    } else {
      reveals[i].classList.remove('active');
    }
  }
}

window.addEventListener && window.addEventListener("DOMContentLoaded", function() {
  document.body.className += " dom-loaded";
  preloaderBlock();
});

window.addEventListener && window.addEventListener("load", function() {
  setTimeout(function() {
    document.body.className += " loaded";
    reveal(); // Trigger the reveal function after the preloader
  }, 1500);
});


gsap.fromTo(
  ".loading-page",
  { opacity: 1 },
  {
    opacity: 0,
    duration: 1.0,
    delay: 2,
    onComplete: function() {
      // Remove the loading page and allow scrolling after the animation is complete
      document.querySelector(".loading-page").remove();
      document.body.style.overflow = "auto";
    }
  }
);












window.addEventListener("scroll", function() {
  const navbar = document.querySelector("nav");
  navbar.classList.toggle("scrolled", window.scrollY > 0);
});

const burger = document.querySelector(".burger");
const navLinks = document.querySelector(".nav-links");

burger.addEventListener("click", function() {
  navLinks.classList.toggle("show");
});



window.addEventListener('scroll', reveal);



function reveal(){
  var reveals = document.querySelectorAll('.reveal');

  for(var i = 0; i < reveals.length; i++){

      var windowheight = window.innerHeight;
      var revealtop = reveals[i].getBoundingClientRect().top; 
      var revealpoint = 150;
      
      if(revealtop < windowheight - revealpoint){ 
        reveals[i].classList.add('active');
    }
    else{
    
      reveals[i].classList.remove('active');
      
  
   }
  }  
}




particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 355,
      "density": {
        "enable": true,
        "value_area": 3500.1476416322727
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 1.8927153781200905,
      "random": false,
      "anim": {
        "enable": true,
        "speed": 0.2,
        "opacity_min": 0,
        "sync": false
      }
    },
    "size": {
      "value": 2,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 2,
        "size_min": 0,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 0.2,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": true,
        "mode": "bubble"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 83.91608391608392,
        "size": 1,
        "duration": 3,
        "opacity": 1,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
});








