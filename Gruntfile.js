module.exports=function(grunt){


var dbconfig=require('./config.json')['dbconfig'];
console.log("in grunt file");

var cfg = 
{
   dbconfig:dbconfig,   

    phplint:
	{
		options:
		{
		  phpCmd:'<%= dbconfig.cmdpath %>',
		  
		  phpArgs: {
                "-l": null
            },
          
		  spawnLimit: 10
		  	  
		  
		},
		
        good: ['<%= dbconfig.lintgood %>']
        
    },
 phploc:
{
default :
  {
   dir: '<%= dbconfig.locdir %>'
  },
   options:
    {
     bin:'<%= dbconfig.locbin %>',
     names:'<%= dbconfig.locnames %>',
     logCSV:'reports/reportloc.csv',
     countTests:true,
     quite:false,
     progress:true,
     verbose:true,
     ansi:true,
     verbose:true,
     logXML:'reports/reportlocXml.xml' 
    }

}  ,

  phpmd : 
    {
    application:
            {
            dir:'<%= dbconfig.mddir %>'
            },
      options:
           {
           bin:'<%= dbconfig.mdbin %>',
           rulesets:'codesize',
           suffixes:'.php',
           reportFile:'./reports/reportmd',
           reportFormat:'html'
           }


    },

   phpunit:
    {
    classes:{ dir:'tests/'},
    options:
    {
   bin :'vendor/bin/phpunit',
  colors:true,
  bootstrap:'build/phpunit.xml',
  logJunit:'./reports/junit.log',
  logJson:'./reports/json.log',
   coverageClover:'./reports/coverage.log',
   textdoxHtml:'reports/phpunit.html'
    }
    },

phpcpd: 
   {
   application:
     {
     dir:'ecomm_project'
      },
    options:
      {
     quite:false,
     bin:'vendor/bin/phpcpd',
     reportFile:'reports/phpcpd.xml',
     miniLines:5,
     miniTokens:70,
     verbose:true,
     resultFile:'reports/result.html'
      }

   },

  phpcs:
   {
   application:
     {
     src:['ecomm_project/*.php']
     },
   options:
   {
      bin:'vendor/bin/phpcs',
      verbose:true,
      showSniffCodes:true,
      reportFile:'reports/phpcs.xml'
   }

   },

 phpdocumentor:
   {
   dist:
  {
    options:
         {
           directory:'ecomm_project',
           bin:'vendor/bin/phpdoc',
           target:'reports/phpdocs'
         }
  }
   },


 jshint:
  
  {
   all:['Gruntfile.js','ecomm_project/js/*.js'],
  options:
   {
   reporter:require('jshint-html-reporter'),
   reporterOutput:'reports/jshint-report.html',
   curly:true,
   eqnull:true,
   browser:true,
   undef:true,
   globals:{jQuery:true}
   }
   
},

exec:
   {
   command:'php ./vendor/bin/phpcs --report=checkstyle --report-file=./reports/checkstyle.xml --standard=Zend ./ecomm_project/*.php'

   },

sonarRunner:
    {
   analysis: {
            options: {
                debug: true,
                separator: '\n',
                sonar: {
                    host: {
                        url: 'http://localhost:9000'
                    },
                    jdbc: {
                        url: 'jdbc:mysql://localhost:3306/sonar',
                        username: 'sonar',
                        password: 'sonar'
                    },
 
                    projectKey: 'sonar:grunt-sonar-runner:0.1.0',
                    projectName: 'Grunt Sonar Runner',
                    projectVersion: '0.10',
                    sources: ['ecomm_project','tests'].join(','),
                    sourceEncoding: 'UTF-8'
                }
            }
        }
    }

 




};
 
grunt.initConfig(cfg);
 
grunt.loadNpmTasks("grunt-phplint");
grunt.loadNpmTasks("grunt-phploc");
grunt.loadNpmTasks("grunt-phpmd");
grunt.loadNpmTasks("grunt-phpunit"); 
grunt.loadNpmTasks("grunt-phpcpd");
grunt.loadNpmTasks("grunt-phpcs");
grunt.loadNpmTasks("grunt-contrib-jshint");
grunt.loadNpmTasks("grunt-phpdocumentor");
grunt.loadNpmTasks("grunt-sonar-runner");
grunt.loadNpmTasks("grunt-exec");
 
grunt.registerTask("default", ["phplint:good","phpmd","phploc","phpunit","phpcpd","phpcs","phpdocumentor","exec"]);

grunt.registerTask("jstasks",["jshint","sonarRunner"]);

}
