/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
  // Define changes to default configuration here. For example:
  //
  // config.uiColor = '#AADC6E';
  config.skin = "moonocolor";
  config.height = 200;
  config.language = "en";
  config.allowedContent = true;
  config.toolbarCanCollapse = true;

  config.extraPlugins =
    "dialogui,dialog,about,a11yhelp,basicstyles,blockquote,notification,button,toolbar,clipboard,panel,floatpanel,menu,contextmenu,resize,elementspath,enterkey,entities,popup,filetools,filebrowser,floatingspace,listblock,richcombo,format,horizontalrule,htmlwriter,wysiwygarea,image,indent,indentlist,fakeobjects,link,list,magicline,maximize,pastetext,xml,ajax,pastetools,pastefromgdocs,pastefromlibreoffice,pastefromword,removeformat,showborders,sourcearea,specialchar,menubutton,scayt,stylescombo,tab,table,tabletools,tableselection,undo,lineutils,widgetselection,widget,notificationaggregator,uploadwidget,uploadimage,btgrid,basewidget,layoutmanager,powrmediagallery,wordcount,quicktable,tableresize,html5video,youtube,slideshow,notification,embed,btgrid,basewidget,layoutmanager,powrmediagallery";

  config.toolbar = [
    { name: "document", items: ["Save", "NewPage", "Templates"] },
    { name: "clipboard", items: ["Cut", "Copy", "Paste", "-", "Undo", "Redo"] },
    {
      name: "basicstyles",
      items: [
        "Bold",
        "Italic",
        "Underline",
        "Strike",
        "Subscript",
        "Superscript",
      ],
    },
    { name: "styles", items: ["Styles", "Format", "Font", "FontSize"] },
    { name: "colors", items: ["TextColor"] },
    {
      name: "editing",
      items: ["Find", "Replace", "-", "SelectAll", "-"],
    },
    {
      name: "paragraph",
      items: [
        "NumberedList",
        "BulletedList",
        "-",
        "Outdent",
        "Indent",
        "-",
        "Blockquote",
        "-",
        "JustifyLeft",
        "JustifyCenter",
        "JustifyRight",
        "JustifyBlock",
        "-",
        "BidiLtr",
        "BidiRtl",
      ],
    },
    { name: "links", items: ["Link", "Unlink", "Youtube"] },
    {
      name: "insert",
      items: [
        "Image",
        // "Html5video",
        // "Embed",
        "Table",
        "HorizontalRule",
        "Smiley",
        // "SpecialChar",
        "Source",
      ],
    },
    { name: "tools", items: ["Maximize", "btgrid", "AddLayout"] },
  ];

  config.embed_provider =
    "//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}";

  config.removeButtons =
    "About,Save,PasteFromWord,Preview,Flash,Iframe,PageBreak,BGColor,RemoveFormat,CopyFormatting,CreateDiv,Language,Anchor,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,PasteText,Print,ShowBlocks";

  config.wordcount = {
    // Whether or not you want to show the Paragraphs Count
    showParagraphs: true,

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,

    // Whether or not you want to count Spaces as Chars
    countSpacesAsChars: false,

    // Whether or not to include Html chars in the Char Count
    countHTML: false,

    // Maximum allowed Word Count, -1 is default for unlimited
    maxWordCount: -1,

    // Maximum allowed Char Count, -1 is default for unlimited
    maxCharCount: -1,

    // Add filter to add or remove element before counting (see CKEDITOR.htmlParser.filter), Default value : null (no filter)
    filter: new CKEDITOR.htmlParser.filter({
      elements: {
        div: function (element) {
          if (element.attributes.class == "mediaembed") {
            return false;
          }
        },
      },
    }),
  };
};
