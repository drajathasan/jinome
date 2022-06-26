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
        jinomeWindows.append(`
            <div id="${currentButton.data('module')}" class="draggable drag bg-white w-full h-screen animate__animated animate__bounceIn absolute">
                <div class="flex justify-between p-3 font-bold">
                    <h1 class="text-lg">${currentButton.data('label')}</h1>
                    <div>
                        <button class="h-5 w-5 bg-yellow-400 rounded-full outline-none border-none minimize" data-for="#${currentButton.data('module')}">-</button>
                        <button class="h-5 w-5 bg-red-500 rounded-full outline-none border-none closewindow" data-for="#${currentButton.data('module')}">x</button>
                    </div>
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
})