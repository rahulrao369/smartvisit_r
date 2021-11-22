
var burl = $('.baseurl').val();
// create Agora client
var client = AgoraRTC.createClient({ mode: "rtc", codec: "vp8" });

var localTracks = {
  videoTrack: null,
  audioTrack: null
};


var localTrackState = {
  videoTrackEnabled: true,
  audioTrackEnabled: true
}


var remoteUsers = {};
// Agora client options
var options = {
  appid: null,
  channel: null,
  uid: null,
  token: null
};

// the demo can auto join channel with params in url
$(() => {
  var urlParams = new URL(location.href).searchParams;
  options.appid = urlParams.get("appid");
  options.channel = urlParams.get("channel");
  options.token = urlParams.get("token");
  if (options.appid && options.channel) {
    $("#appid").val(options.appid);
    $("#token").val(options.token);
    $("#channel").val(options.channel);
    $("#join-form").submit();
  }
})

// $("#join-form").click(async function (e) {
//   e.preventDefault();
//   $("#join").attr("disabled", true);
//   try {
//     options.appid = $("#appid").val();
//     options.token = $("#token").val();
//     options.channel = $("#channel").val();
//     await join();
//     if(options.token) {
//       $("#success-alert-with-token").css("display", "block");
//     } else {
//       $("#success-alert a").attr("href", `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`);
//       $("#success-alert").css("display", "block");
//     }
//   } catch (error) {
//     console.error(error);
//   } finally {
//     $("#leave").attr("disabled", false);
//   }
// })

 async function joincall() {
  //e.preventDefault();
//   alert()
  $("#join").attr("disabled", true);
  try {
    options.appid = $("#appid").val();
    options.token = $("#token").val();
    options.channel = $("#channel").val();
    await join();
    if(options.token) {
      $("#success-alert-with-token").css("display", "block");
    } else {
      $("#success-alert a").attr("href", `index.html?appid=${options.appid}&channel=${options.channel}&token=${options.token}`);
      $("#success-alert").css("display", "block");
    }
  } catch (error) {
    console.error(error);
  } finally {
    $("#leave").attr("disabled", false);
  }
}

$("#leave").click(function (e) {
    //  window.close();
  leave();
 
//   $('.modal').modal('hide');

});



$("#mute-audio").click(function (e) {
  if (localTrackState.audioTrackEnabled) {
    muteAudio();
  } else {
    unmuteAudio();
  }
});


$("#mute-video").click(function (e) {
  if (localTrackState.videoTrackEnabled) {
     
    muteVideo();
  } else {
    unmuteVideo();
  }
});


// $('#clientmute').click(function(e){
//     // alert('ok')
//     client.on('mute-video');
// })


async function join() {

  // add event listener to play remote tracks when remote user publishs.
  client.on("user-published", handleUserPublished);
  client.on("user-unpublished", handleUserUnpublished);

  // join a channel and create local tracks, we can use Promise.all to run them concurrently
  [ options.uid, localTracks.audioTrack, localTracks.videoTrack ] = await Promise.all([
    // join the channel
    client.join(options.appid, options.channel, options.token || null,2),
    // create local tracks, using microphone and camera
    AgoraRTC.createMicrophoneAudioTrack(),
    AgoraRTC.createCameraVideoTrack(),
   
  ]);
  
  showMuteButton();
  // play local video track
  localTracks.videoTrack.play("local-player");
  $("#local-player-name").text(`localVideo(${options.uid})`);

  // publish local tracks to channel
  await client.publish(Object.values(localTracks));
  console.log("publish success");
  
  $('.connecting').css('display', 'none');
}

async function leave() {
     
  for (trackName in localTracks) {
    var track = localTracks[trackName];
    if(track) {
      track.stop();
      track.close();
      localTracks[trackName] = undefined;
      
    }
  }

  // remove remote users and player views
    //   alert('ok')
  remoteUsers = {};
  $("#remote-playerlist").html("");
//   $('.modal').modal('hide');
  // leave the channel
  await client.leave();
   
  $("#local-player-name").text("");
  $("#join").attr("disabled", false);
  $("#leave").attr("disabled", true);
  hideMuteButton();
  console.log("client leaves channel success");
}

async function subscribe(user, mediaType) {

  const uid = user.uid;
  // subscribe to a remote user
  await client.subscribe(user, mediaType);
  console.log("subscribe success");
  if (mediaType === 'video') {
      $('.patient-model').addClass("ptid-"+uid);
    const player = $(`
      <div id="player-wrapper-${uid}">
        
        <div id="player-${uid}" class="player"></div>
      </div>
    `);
    $("#remote-playerlist").append(player);
    user.videoTrack.play(`player-${uid}`);
    // $('#p_size_doctor_id_caller').val(uid);
  }
  if (mediaType === 'audio') {
    user.audioTrack.play();
  }
}

// <p class="player-name">remoteUser(${uid})</p>
function handleUserPublished(user, mediaType) {
  const id = user.uid;
  remoteUsers[id] = user;
  subscribe(user, mediaType);
}

function handleUserUnpublished(user) {
    
  const id = user.uid;
  delete remoteUsers[id];
  $(`#player-wrapper-${id}`).remove();
  $('.ptid'+id).modal('hide');
}


// $("#mute-audio").click(function (e) {
//   if (localTrackState.audioTrackEnabled) {
//       alert('muteaudio')
//     muteAudio();
//   } else {
//       alert('unmute')
//     unmuteAudio();
//   }
// });



function hideMuteButton() {
  $("#mute-audio").css("display", "none");
}

function showMuteButton() {
  $("#mute-audio").css("display", "inline-block");
}

async function muteAudio() {
  if (!localTracks.audioTrack) return;
  await localTracks.audioTrack.setEnabled(false);
  localTrackState.audioTrackEnabled = false;
   $("#mute-audio").attr("src",burl+'/mute.png');
}

async function unmuteAudio() {
  if (!localTracks.audioTrack) return;
  await localTracks.audioTrack.setEnabled(true);
  localTrackState.audioTrackEnabled = true;
  $("#mute-audio").attr("src",burl+'/mic.png');
}



async function muteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setEnabled(false);
  localTrackState.videoTrackEnabled = false;
  $("#mute-video").text("Unmute Video");
}



async function unmuteVideo() {
  if (!localTracks.videoTrack) return;
  await localTracks.videoTrack.setEnabled(true);
  localTrackState.videoTrackEnabled = true;
  $("#mute-video").text("Mute Video");
}


