<div class="page-loader">
<div class="e-loadholder">
    <div class="m-loader">
        <span class="e-text">同樂 Tongle</span>
    </div>
</div>
<div id="particleCanvas-Blue"></div>
<div id="particleCanvas-White"></div>
</div>

<link rel="stylesheet" href="/assets/css/loader.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js" integrity="sha512-jq8sZI0I9Og0nnZ+CfJRnUzNSDKxr/5Bvha5bn7AHzTnRyxUfpUArMzfH++mwE/hb2efOo1gCAgI+1RMzf8F7g==" crossorigin="anonymous"></script>
<script>
    particlesJS("particleCanvas-Blue", {
        particles: {
            number: {
                value: 100,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: "#1B5F70"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000"
                },
                polygon: {
                    nb_sides: 3
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: 0.5,
                random: false,
                anim: {
                    enable: true,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 10,
                random: true,
                anim: {
                    enable: false,
                    speed: 10,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: false,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 0.5,
                direction: "none",
                random: true,
                straight: false,
                out_mode: "bounce",
                bounce: false,
                attract: {
                    enable: false,
                    rotateX: 394.57382081613633,
                    rotateY: 157.82952832645452
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "grab"
                },
                onclick: {
                    enable: false,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 200,
                    line_linked: {
                        opacity: 0.2
                    }
                },
                bubble: {
                    distance: 1500,
                    size: 40,
                    duration: 7.272727272727273,
                    opacity: 0.3676323676323676,
                    speed: 3
                },
                repulse: {
                    distance: 50,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });

    particlesJS("particleCanvas-White", {
        particles: {
            number: {
                value: 250,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: "#ffffff"
            },
            shape: {
                type: "circle",
                stroke: {
                    width: 0,
                    color: "#000000"
                },
                polygon: {
                    nb_sides: 3
                },
                image: {
                    src: "img/github.svg",
                    width: 100,
                    height: 100
                }
            },
            opacity: {
                value: 0.5,
                random: true,
                anim: {
                    enable: false,
                    speed: 0.2,
                    opacity_min: 0,
                    sync: false
                }
            },
            size: {
                value: 15,
                random: true,
                anim: {
                    enable: true,
                    speed: 10,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: false,
                distance: 150,
                color: "#ffffff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 0.5,
                direction: "none",
                random: true,
                straight: false,
                out_mode: "bounce",
                bounce: false,
                attract: {
                    enable: true,
                    rotateX: 3945.7382081613637,
                    rotateY: 157.82952832645452
                }
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: false,
                    mode: "grab"
                },
                onclick: {
                    enable: false,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 200,
                    line_linked: {
                        opacity: 0.2
                    }
                },
                bubble: {
                    distance: 1500,
                    size: 40,
                    duration: 7.272727272727273,
                    opacity: 0.3676323676323676,
                    speed: 3
                },
                repulse: {
                    distance: 50,
                    duration: 0.4
                },
                push: {
                    particles_nb: 4
                },
                remove: {
                    particles_nb: 2
                }
            }
        },
        retina_detect: true
    });
    
        document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.page-loader').classList.add('hidden');
    });
</script>
<?php /**PATH E:\xampp\htdocs\msm\resources\views/layouts/loader/loader.blade.php ENDPATH**/ ?>