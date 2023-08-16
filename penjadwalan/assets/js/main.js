$(function(){

    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    $('#color').colorpicker(); // Colopicker
    

    var base_url='http://localhost/penjadwalan/'; // Here i define the base_url

    // Fullcalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
             right: 'month, basicWeek, basicDay'
        },
        // Get all events stored in database
        eventLimit: true, // allow "more" link when too many events
        events: base_url+'calendar/getEvents',
        selectable: true,
        selectHelper: true,
        editable: true, // Make the event resizable true           
            select: function(start, end) {
                
                $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                 // Open modal to add event
            modal({
                // Available buttons when adding
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-success', // Buttons class
                        label: 'Add' // Buttons label
                    }
                },
                title: 'Tambah Kegiatan' // Modal title
            });
            }, 
           
         eventDrop: function(event, delta, revertFunc,start,end) {  
            
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'calendar/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();


            });



          },
          eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
                    
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'calendar/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();

            });
            },
          
        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){

            var tooltip = '<div class="event-tooltip">' + calEvent.lokasi +'</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function(calEvent, jsEvent, view) {
            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;

            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Delete'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: 'Update'
                    }
                },
                title: 'Edit Event "' + calEvent.title + '"',
                event: calEvent
            });
        }

    });

    // Prepares the modal window according to data passed
    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#jenisevent').val(data.event ? data.event.jenisevent : '');
        $('#title').val(data.event ? data.event.title : '');
        $('#instansi').val(data.event ? data.event.instansi : '');
        $('#lokasi').val(data.event ? data.event.lokasi : '');
        $('#isp').val(data.event ? data.event.isp : '');
        $('#petugas').val(data.event ? data.event.petugas : '');
        $('#petugas2').val(data.event ? data.event.petugas2 : '');        
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }

    // Handle Click on Add Button
    $('.modal').on('click', '#add-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post(base_url+'calendar/addEvent', {
                jenisevent: $('#jenisevent').val(),
                title: $('#title').val(),
                instansi: $('#instansi').val(),
                lokasi: $('#lokasi').val(),
                isp: $('#isp').val(),
                petugas: $('#petugas').val(),
                petugas2: $('#petugas2').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                start: $('#start').val(),
                end: $('#end').val()
            }, function(result){
                $('.alert').addClass('alert-success').text('Event added successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
            });
        }
    });


    // Handle click on Update Button
    $('.modal').on('click', '#update-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post(base_url+'calendar/updateEvent', {
                id: currentEvent._id,
                jenisevent: $('#jenisevent').val(),
                title: $('#title').val(),
                instansi: $('#instansi').val(),
                lokasi: $('#lokasi').val(),
                isp: $('#isp').val(),
                petugas: $('#petugas').val(),
                petugas2: $('#petugas2').val(),
                description: $('#description').val(),
                color: $('#color').val(),
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
                
            });
        }
    });



    // Handle Click on Delete Button
    $('.modal').on('click', '#delete-event',  function(e){
        $.get(base_url+'calendar/deleteEvent?id=' + currentEvent._id, function(result){
            $('.alert').addClass('alert-success').text('Event deleted successfully !');
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
            hide_notify();
        });
    });

    function hide_notify()
    {
        setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                }, 2000);
    }


    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            $('.error').html('Please insert title and description');
            return false;
        }
        return true;
    }

    // // Auto Fill Value Color
    // function myFunction(event) {
    //     console.log(event.target.value)
      
    //     if (event.target.value === "Fasilitasi Internet") {
    //       document.getElementById("color").value = "#ffc107";
    //     } else if (event.target.value === "Assessment Jaringan") {
    //       document.getElementById("color").value = "#6c757d";
    //     } else if (event.target.value === "Pemasangan Jaringan") {
    //         document.getElementById("color").value = "#28a745";
    //     } else if (event.target.value === "Troubleshooting Jaringan") {
    //       document.getElementById("color").value = "#dc3545";
    //     } else if (event.target.value === "Internet Desa") {
    //       document.getElementById("color").value = "#007bff";
    //     };
    // }
});