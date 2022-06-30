import interact from 'interactjs'

// target elements with the "draggable" class
interact('.draggable')
    .resizable({
    // resize from all edges and corners
    edges: { left: true, right: true, bottom: true, top: true },

    listeners: {
      move (event) {
        var target = event.target
        var x = (parseFloat(target.getAttribute('data-x')) || 0)
        var y = (parseFloat(target.getAttribute('data-y')) || 0)

        // update the element's style
        target.style.width = event.rect.width + 'px'
        target.style.height = event.rect.height + 'px'

        // translate when resizing from top or left edges
        x += event.deltaRect.left
        y += event.deltaRect.top

        target.style.transform = 'translate(' + x + 'px,' + y + 'px)'

        target.setAttribute('data-x', x)
        target.setAttribute('data-y', y)
      }
    },
    modifiers: [
      // keep the edges inside the parent
      interact.modifiers.restrictEdges({
        outer: 'parent'
      }),

      // minimum size
      interact.modifiers.restrictSize({
        min: { width: 100, height: 50 }
      })
    ],

    inertia: true
  })
  .draggable({
    // enable inertial throwing
    inertia: true,
    // keep the element within the area of it's parent
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'parent',
        endOnly: true
      })
    ],
    // enable autoScroll
    autoScroll: true,

    listeners: {
      // call this function on every dragmove event
      move: dragMoveListener,

      // call this function on every dragend event
      end (event) {
        event.target.style.width = '100%';
        event.target.style.height = '100vh';
        event.target.style.cursor = 'default !important';
        event.target.classList.add('animate__animated','animate__bounceIn')
      }
    }
  })

function dragMoveListener (event) {
  var target = event.target
  // keep the dragged position in the data-x/data-y attributes
  var x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx
  var y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy

  // translate the element
  target.style.transform = 'translate(' + x + 'px, ' + y + 'px)'
  if (target.style.width = '100%')
  {
    target.style.width = '1000px';
    target.style.height = '350px';   
  }
  

  // update the posiion attributes
  target.setAttribute('data-x', x)
  target.setAttribute('data-y', y)
  target.classList.remove('animate__animated','animate__bounceIn')
}

// this function is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener

$('.openDragWindow').click(function(){
    let currentButton = $(this)
    let jinomeWindows = $('#windows');
    
    if ($(`#${currentButton.data('module')}`).length == 0)
    {
        let r = (Math.random() + 1).toString(35).substring(5);
        jinomeWindows.append(`
            <div id="${currentButton.data('module')}" class="draggable drag bg-white w-full h-screen animate__animated animate__bounceIn absolute">
                <div class="flex justify-between p-3 font-bold">
                    <div class="flex flex-row items-center">
                      <h1 class="text-md mr-2">${$('title').text()}</h1> :: 
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" data-reload-for="#iframeFor${currentButton.data('module')}" class="reloadIframe cursor-pointer hover:bg-gray-800 hover:text-white p-1 rounded-full ml-2 bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                      </svg>
                    </div>
                    <div>
                        <button class="h-5 w-5 bg-yellow-400 rounded-full outline-none border-none minimize" data-for="#${currentButton.data('module')}">-</button>
                        <button class="h-5 w-5 bg-red-500 rounded-full outline-none border-none closewindow" data-for="#${currentButton.data('module')}">x</button>
                    </div>
                </div>
                <div class="flex">
                  <iframe id="iframeFor${currentButton.data('module')}" src="?module=${currentButton.data('module')}&refresh=${r}" class="w-full" style="height: 90vh"></iframe>
                </div>
            </div>
        `)
    }
    else
    {
        $(`#${currentButton.data('module')}`).removeClass('animate__bounceOutDown').addClass('animate__bounceInUp')
    }
})

$('#windows').on('click', '.closewindow', function(){
    let closeWindow = $(this)
    $(`${closeWindow.data('for')}`).removeClass('animate__bounceIn').addClass('animate__bounceOutDown')
    setTimeout(() => { $(`${closeWindow.data('for')}`).remove() }, 1000);
})

$('#windows').on('click', '.minimize', function(){
    let closeWindow = $(this)
    $(`${closeWindow.data('for')}`).removeClass('animate__bounceIn').addClass('animate__bounceOutDown')
})

$('#windows').on('click', '.reloadIframe', function(){
  $($(this).data('reload-for')).attr("src", $($(this).data('reload-for')).attr("src"));
});

// Full screen
$('.fullscreen').click(function(){
    if (!document.fullscreenElement) {
        $('#fullscreenIcon').addClass('d-none')
        $('#closefullscreenIcon').removeClass('d-none')
        document.documentElement.requestFullscreen();
    } else {
        if (document.exitFullscreen) {
            $('#fullscreenIcon').removeClass('d-none')
        $('#closefullscreenIcon').addClass('d-none')
            document.exitFullscreen();
        }
    }
});

// menu
$('#triggerMenu').click(function(){
  $(this).addClass('hidden');
  scroll({
    top: 0,
    behavior: "smooth"
  });

  setTimeout(() => {
    $('#submenu').show();
    $('#mainContent').hide();
  }, 100);
});

$('.loadContent').click(function(e){
  let link = $(this).attr('href');
  e.preventDefault();
  scroll({
    top: 0,
    behavior: "smooth"
  });
  setTimeout(() => {
    $('#triggerMenu').removeClass('hidden');
    $('#submenu').hide();
    $('#mainContent').show();
    $('#mainContent').simbioAJAX(link);
  }, 100);
})

