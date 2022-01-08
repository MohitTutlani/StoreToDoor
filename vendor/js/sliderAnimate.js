$(document).ready(function() {
            var options = {
                menu: ['Animate', 'Nice', 'Customize', 'Friendly'],
                position: 'right',
                themeColor: '#ff3b2f',
                id: 'exampleSide',
                afterInit: function() {
                    var currentIndex = parseInt($('#fullpage').find('.fp-section.active').attr('data-anchor'));
                    sidenav.activeMenuAndTag(currentIndex);
                }
            }
            var sidenav = new SideNavi(options);
            $('#fullpage').fullpage({
                sectionsColor: ['#f5f7f9', '#eeefff', '#fff', '#eee'],
                anchors: ['1', '2', '3', '4', '5'],
                onLeave: function(index, nextIndex) {
                    sidenav.activeMenuAndTag(nextIndex);
                },
                afterLoad: function(index) {
                    var loadedSection = $(this);
                    switch (index) {
                        case 1:
                            loadedSection.find('h2').addClass('animated fadeInUp'),
                                loadedSection.find('.fadeIn-anim').addClass('animated fadeInUp'),
                                loadedSection.find('.animate-left').addClass('animated fadeInLeft'),
                                loadedSection.find('img').addClass('animated fadeInRight');
                            break;
                        case 2:
                            loadedSection.find('h2').addClass('animated fadeInUp'),
                                loadedSection.find('.fadeIn-anim').addClass('animated fadeInUp'),
                                loadedSection.find('.animate-left').addClass('animated fadeInLeft'),
                                loadedSection.find('img').addClass('animated fadeInRight');
                            break;
                        case 3:
                            loadedSection.find('h2').addClass('animated fadeInUp'),
                                loadedSection.find('.fadeIn-anim').addClass('animated fadeInUp'),
                                loadedSection.find('.animate-left').addClass('animated fadeInLeft'),
                                loadedSection.find('img').addClass('animated fadeInRight');
                            break;
                        case 4:
                            loadedSection.find('h2').addClass('animated fadeInUp'),
                                loadedSection.find('.fadeIn-anim').addClass('animated fadeInUp'),
                                loadedSection.find('.animate-left').addClass('animated fadeInLeft'),
                                loadedSection.find('img').addClass('animated fadeInRight');
                            break;
                    }

                }
            });
        });