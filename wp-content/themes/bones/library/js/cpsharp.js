/*global cpsharp*/

let store = {'footer': null, 'myGif': null, 'cpsharp': cpsharp, 'svgStore': null};

jQuery(document).ready(function () {
    stickyFooter();
    menuLogoLinkToAnchor();
    doContactFormFun('contactform')
    doTheVivusThing('contentdiv', 150, store.cpsharp.tdi + "/svgs/draft2.svg");
    doTheGifThing('chilidgif');
});

function menuLogoLinkToAnchor(){
    jQuery("#logo > a").attr('href', '#home');
}

function doContactFormFun(formid){
    appear(
        {
            init: function init() {
                console.log('dom is ready');
            },
            elements: function elements() {
                let forRef = document.getElementById(formid);
                return [forRef];
            },
            appear: function appear(el) {
                console.log('contact form appeared');

            },
            disappear: function disappear(el) {
                console.log('no longer visible', el);
            },
            reappear: true
        });
}

function doTheGifThing(id) {
    let jqGif = jQuery('#' + id + '>div>div>img');
    jqGif.attr('rel:auto_play', '0');
    let baseuploadDir = store.cpsharp.uploads.baseurl;  // https://saltmine.cpsharp.net/wp-content/uploads/
    let fullanim = baseuploadDir + "/2018/02/chilid.red_.650x645.gif";
    jqGif.attr('rel:animated_src', fullanim);
    store.myGif = new SuperGif({
        gif: jqGif[0],
        show_progress_bar: false,
        draw_while_loading: true,
        max_width: jqGif.width(),
        loop_mode: false,
        on_end: function () {
            setTimeout(function () {
                store.myGif.move_to(84);
                store.myGif.play();
            }, 1000);
        }
    });

    // let gifCanvas = store.myGif.get_canvas();

    store.myGif.load(function (smh) {
        console.log('loaded gif complete');
        console.log(smh);
        appear(
            {
                init: function init() {
                    console.log('dom is ready');
                },
                elements: function elements() {
                    let forRef = store.myGif.get_canvas();
                    return [forRef];
                },
                appear: function appear(el) {
                    console.log('gif appeared!');
                    store.myGif.play();
                },
                disappear: function disappear(el) {
                    console.log('no longer visible', el);
                },
                reappear: false
            });
    });


}

function stickyFooter() {
    store['footer'] = jQuery("#foot");
}

function doTheVivusThing(targetDivId, time, uriToSvg) {
    new Vivus(targetDivId, {
        type: 'oneByOne',
        start: 'autostart',
        forceRender: false,
        file: uriToSvg,
        duration: time
    }, justChill);
}

function justChill(events) {
    console.log(events);
    console.log('k, just chilling.');
    LoadSnap(events);
}

function funcDiagHover(meh) {
    console.log(meh);
    store.svgStore.exclude(this);
    store.svgStore.animate({'opacity': 0.2}, 180);
    jQuery('#' + this.node.id + "Spread").removeClass('hidden');
}

function funcDiagHoverOut(meh) {
    console.log(meh);
    store.svgStore.push(this);
    store.svgStore.animate({'opacity': 1}, 180);
    jQuery('#' + this.node.id + "Spread").addClass('hidden');
}

function handleDiagramMap(diagramMap) {
    for (let i = 0; i < diagramMap.length; i++) {
        diagramMap[i].obj.selectAll('path').attr({fill: 'rgba(255,255,255,.0)'});
        diagramMap[i].obj.hover(funcDiagHover, funcDiagHoverOut);
    }
}

function LoadSnap(raya) {
    let s = Snap(raya.el);
    store.svgStore = s.selectAll('g');

    let diagramMap = [];
    diagramMap.push({'title': 'strategicInput', 'obj': s.select('g[id="Stratint"]')});
    diagramMap.push({'title': 'thoughtAlignment', 'obj': s.select('g[id="ThoughtAlignment"]')});
    diagramMap.push({'title': 'needsAnalysis', 'obj': s.select('g[id="NeedsAnalysis"]')});
    diagramMap.push({'title': 'layoutTranslate', 'obj': s.select('g[id="_x32_DLayout"]')});
    diagramMap.push({'title': 'designExperience', 'obj': s.select('g[id="Experience_1_"]')});

    handleDiagramMap(diagramMap);


    /*
        let containerGroup = s.group(c1, c2);
        containerGroup.select
        All('path').attr({fill: '#fff'});
        containerGroup.hover(
            function () {
                all.exclude(c1);
                all.exclude(c2);
                all.animate({opacity: '0.2'}, 180);
                document.querySelector('.container').classList.add('container--active')
            },
            function () {
                all.push(c1);
                all.push(c2);
                all.animate({opacity: 1.0}, 180);
                document.querySelector('.container').classList.remove('container--active')
            });

        let h1 = s.select('g[id="HTML-1"]');
        let h2 = s.select('g[id="HTML-2"]');
        let htmlGroup = s.group(h1, h2);
        htmlGroup.selectAll('path').attr({fill: '#fff'});
        htmlGroup.hover(
            function () {
                all.exclude(h1);
                all.exclude(h2);
                all.animate({opacity: '0.2'}, 180);
                document.querySelector('.static').classList.add('static--active')
            },
            function () {
                all.push(h1);
                all.push(h2);
                all.animate({opacity: 1.0}, 180);
                document.querySelector('.static').classList.remove('static--active')
            });


        bucketGroup.selectAll('path').attr({fill: '#fff'});
        bucketGroup.hover(
            function () {
                all.exclude(this);
                all.animate({opacity: '0.2'}, 180);
                document.querySelector('.bucket').classList.add('bucket--active')
            },
            function () {
                all.push(this);
                all.animate({opacity: 1.0}, 180);
                document.querySelector('.bucket').classList.remove('bucket--active')
            });*/
}
