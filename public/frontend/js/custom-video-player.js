$(document).ready(function () {
  var player = videojs("video");
   
       player.playlist([
       {
        "name": "Introduction to Drawing Shapes",
        "duration": "20",
        "sources": [
        { "src": "/frontend/videos/flowers.mp4", "type": "video/mp4" },
        { "src": "/frontend/videos/flowers.webm", "type": "video/webm" }
        ],

        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/video-poster.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/video-poster-thumb.png"
        }
        ]
      },
      {
        "name": "Basic of Drawing",
        "duration": "10",
        "sources": [
        { "src": "/frontend/videos/flowers.mp4?2", "type": "video/mp4" },
        { "src": "/frontend/videos/flowers.webm?2", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster//oceans.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/oceans-low.png"
        }
        ]
      },
      {
        "name": "Choose your method",
        "duration": "15",
        "sources": [
        { "src": "/frontend/videos/sample.mp4?3", "type": "video/mp4" },
        { "src": "/frontend/videos/sample.webm?3", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/oceans.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/oceans-low.png"
        }
        ]
      },
      {
        "name": "Craft your class Project",
        "duration": "15",
        "sources": [
        { "src": "/frontend/videos/sample.mp4?3", "type": "video/mp4" },
        { "src": "/frontend/videos/sample.webm?3", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/video-poster.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/video-poster-thumb.png"
        }
        ]
      },
       {
        "name": "Introduction to Drawing Shapes",
        "duration": "20",
        "sources": [
        { "src": "/frontend/videos/flowers.mp4", "type": "video/mp4" },
        { "src": "/frontend/videos/flowers.webm", "type": "video/webm" }
        ],

        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/video-poster.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/video-poster-thumb.png"
        }
        ]
      },
      {
        "name": "Basic of Drawing",
        "duration": "10",
        "sources": [
        { "src": "/frontend/videos/flowers.mp4?2", "type": "video/mp4" },
        { "src": "/frontend/videos/flowers.webm?2", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster//oceans.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/oceans-low.png"
        }
        ]
      },
      {
        "name": "Choose your method",
        "duration": "15",
        "sources": [
        { "src": "/frontend/videos/sample.mp4?3", "type": "video/mp4" },
        { "src": "/frontend/videos/sample.webm?3", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/oceans.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/oceans-low.png"
        }
        ]
      },
      {
        "name": "Craft your class Project",
        "duration": "15",
        "sources": [
        { "src": "/frontend/videos/sample.mp4?3", "type": "video/mp4" },
        { "src": "/frontend/videos/sample.webm?3", "type": "video/webm" }
        ],
        "thumbnail": [
        {
          "srcset": "/frontend/video-poster/video-poster.png",
          "type": "image/png",
          "media": "(min-width: 400px;)"
        },
        {
          "src": "/frontend/video-poster/video-poster-thumb.png"
        }
        ]
      }
    ]);

    // Initialize the playlist-ui plugin with the horizontal option
    player.playlistUi({
      horizontal: false,
      playOnSelect: true
    });

    $('.vjs-playlist').mCustomScrollbar({
    // mouseWheel:{ preventDefault: true },
    scrollbarPosition: 'inside',
    autoExpandScrollbar:true,
    theme: 'inset-3',
    axis:"y",
  });
    $('.vjs-playlist-vertical .vjs-playlist-item').on('click', function(e) {
      $('.preview-player .title').html($(this).find('cite').attr('title'));
    });
});