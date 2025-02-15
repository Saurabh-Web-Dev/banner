(function() {
    // creating function to showing banner in div
    function displayBanner(width = 300, height = 100, position = 'bottom-right', targetElement = 'body',image_id = 'Mw==') {
      // console.log(position)
      const positions = {
        'top-left': { top: '10px', left: '10px' },
        'top-right': { top: '10px', right: '10px' },
        'bottom-left': { bottom: '10px', left: '10px' },
        'bottom-right': { bottom: '10px', right: '10px' }
      };

      const positionStyle = positions[position] || positions['bottom-right'];
  
      let target;
      if (targetElement.startsWith('#')) {
        target = document.querySelector(targetElement); // ID selector
      } else if (targetElement.startsWith('.')) {
        target = document.querySelector(targetElement); // Class selector
      } else {
        target = document.querySelector(targetElement); // Default to 'body' if no valid selector
      }
  
      if (!target) {
        console.error('Target element not found. The banner will not be displayed.');
        return;
      }
  
      // Creating the banner container element
      const banner = document.createElement('div');
      banner.style.position = 'relative';
      banner.style.width = `${width}px`;
      banner.style.height = `${height}px`;
      banner.style.zIndex = 9999;
      banner.style.cursor = 'pointer';
      Object.assign(banner.style, positionStyle);
      // Fetching data by API's
      fetch('http://localhost/banner/api.php?imgid='+image_id)
        .then(response => response.json())
        .then(data => {
          const img = document.createElement('img');
          img.src = atob(data.images[0].image_url);
          img.alt = data.images[0].alt_text;
          img.style.width = '100%';
          img.style.height = '100%';
          var imff = data.images[0].link;
  
          // Making the banner clickable for redirect
          banner.addEventListener('click', () => {
            // window.location.href = imff;
            window.open(imff, "_blank");
          });
  
          banner.appendChild(img);
  
          target.appendChild(banner);
        })
        .catch(error => {
          console.error('Error fetching banner details:', error);
        });
    }
    // creating Global window object to Glogbal accessible
    window.displayBanner = displayBanner;
  })();
  
  