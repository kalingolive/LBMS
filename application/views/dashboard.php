<?php
 include_once 'header.php';
?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $this->lang->line('title'); ?></small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Overall Land Bank Overview</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie" style="height:400px;">
                      
                    </div>
            
                  </div>
                </div>
              </div>

            </div>

            <div id="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Overview of lands allocated by land type</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie2" style="height:350px;">
                      
                    </div>

                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Overview of lands banked by type</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div id="echart_pie3" style="height:350px;">
                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php
 include_once 'footer.php';
?>


    <!-- Datatables -->
    <script>
       $(document).ready(function() {

            var total_land = 0;
            var total_merit = 0;
            var total_bid = 0;
            var total_commerce = 0;
            var total_mixed = 0;
            var total_residential = 0;
            var total_green = 0;
            var total_service = 0;
            var total_manuf = 0;
            var total_administrative = 0;
            var total_recreation = 0;
            
            var total_redev_land = 0;
            var total_expansion = 0;
            var total_noDeed_green = 0;
            var total_temp_land = 0;
            var total_open = 0;

            var url = window.location.replace = "dashboard/get_dashboard";
            var response = new Object();
            $.ajax({
                url: url,
                type: "POST",
                async:false,
                success: function(response)
                {
                    var obj = JSON.parse(response);
                    console.log(obj);
                      $.each(obj.land_data, function(key, value){
                        //console.log(value['area_size']);
                        total_land += parseInt(value['area_size']);
                      });

                      $.each(obj.transfer_data[1], function(key, value){
                        //console.log(value[0].total_area_alloc);
                        total_merit += parseInt(value[0].total_area_alloc);
                      });

                      $.each(obj.transfer_data[2], function(key, value){
                       // console.log(value[0].total_area_bid);
                        total_bid += parseInt(value[0].total_area_bid);
                      });

                      $.each(obj.transfer_type[1], function(key, value){
                       // console.log(value[0].total_area_bid);
                         if(value[0].land_use == "commerce")
                          total_commerce += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "mixed use")
                          total_mixed += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "residential")
                          total_residential += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "green area")
                          total_green += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "service")
                          total_service += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "manufacturing & storage ")
                          total_manuf += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "administrative")
                          total_administrative += parseInt(value[0].total_area_alloc);
                        if(value[0].land_use == "recreation")
                          total_recreation += parseInt(value[0].total_area_alloc);
                      });  

                      $.each(obj.transfer_type[2], function(key, value){
                       // console.log(value[0].total_area_bid);
                         if(value[0].land_use == "commerce")
                          total_commerce += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "mixed use")
                          total_mixed += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "residential")
                          total_residential += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "green area")
                          total_green += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "service")
                          total_service += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "manufacturing & storage ")
                          total_manuf += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "administrative")
                          total_administrative += parseInt(value[0].total_area_bid);
                        if(value[0].land_use == "recreation")
                          total_recreation += parseInt(value[0].total_area_bid);
                      }); 

                      $.each(obj.land_type, function(key, value){
                       // console.log(value[0].total_area_bid);
                         if(value[0].id == "1")
                          total_open += parseInt(value[0].total_area);
                        if(value[0].id == "2")
                          total_redev_land += parseInt(value[0].total_area);
                        if(value[0].id == "3")
                          total_expansion += parseInt(value[0].total_area);
                        if(value[0].id == "4")
                          total_noDeed_green += parseInt(value[0].total_area);
                        if(value[0].id == "5")
                          total_temp_land += parseInt(value[0].total_area);
             
                      }); 
                        
                }
            });
            var total_unoccupied = total_land - (total_merit + total_bid);
            var total_occupied = (total_merit + total_bid);

           // console.log(total_mixed);
                  var theme = {
                              color: [
                                  '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
                                  '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
                              ],

                              title: {
                                  itemGap: 8,
                                  textStyle: {
                                      fontWeight: 'normal',
                                      color: '#408829'
                                  }
                              },

                              dataRange: {
                                  color: ['#1f610a', '#97b58d']
                              },

                              toolbox: {
                                  color: ['#408829', '#408829', '#408829', '#408829']
                              },

                              tooltip: {
                                  backgroundColor: 'rgba(0,0,0,0.5)',
                                  axisPointer: {
                                      type: 'line',
                                      lineStyle: {
                                          color: '#408829',
                                          type: 'dashed'
                                      },
                                      crossStyle: {
                                          color: '#408829'
                                      },
                                      shadowStyle: {
                                          color: 'rgba(200,200,200,0.3)'
                                      }
                                  }
                              },

                              dataZoom: {
                                  dataBackgroundColor: '#eee',
                                  fillerColor: 'rgba(64,136,41,0.2)',
                                  handleColor: '#408829'
                              },
                              grid: {
                                  borderWidth: 0
                              },

                              categoryAxis: {
                                  axisLine: {
                                      lineStyle: {
                                          color: '#408829'
                                      }
                                  },
                                  splitLine: {
                                      lineStyle: {
                                          color: ['#eee']
                                      }
                                  }
                              },

                              valueAxis: {
                                  axisLine: {
                                      lineStyle: {
                                          color: '#408829'
                                      }
                                  },
                                  splitArea: {
                                      show: true,
                                      areaStyle: {
                                          color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                                      }
                                  },
                                  splitLine: {
                                      lineStyle: {
                                          color: ['#eee']
                                      }
                                  }
                              },
                              timeline: {
                                  lineStyle: {
                                      color: '#408829'
                                  },
                                  controlStyle: {
                                      normal: {color: '#408829'},
                                      emphasis: {color: '#408829'}
                                  }
                              },

                              k: {
                                  itemStyle: {
                                      normal: {
                                          color: '#68a54a',
                                          color0: '#a9cba2',
                                          lineStyle: {
                                              width: 1,
                                              color: '#408829',
                                              color0: '#86b379'
                                          }
                                      }
                                  }
                              },
                              map: {
                                  itemStyle: {
                                      normal: {
                                          areaStyle: {
                                              color: '#ddd'
                                          },
                                          label: {
                                              textStyle: {
                                                  color: '#c12e34'
                                              }
                                          }
                                      },
                                      emphasis: {
                                          areaStyle: {
                                              color: '#99d2dd'
                                          },
                                          label: {
                                              textStyle: {
                                                  color: '#c12e34'
                                              }
                                          }
                                      }
                                  }
                              },
                              force: {
                                  itemStyle: {
                                      normal: {
                                          linkStyle: {
                                              strokeColor: '#408829'
                                          }
                                      }
                                  }
                              },
                              chord: {
                                  padding: 4,
                                  itemStyle: {
                                      normal: {
                                          lineStyle: {
                                              width: 1,
                                              color: 'rgba(128, 128, 128, 0.5)'
                                          },
                                          chordStyle: {
                                              lineStyle: {
                                                  width: 1,
                                                  color: 'rgba(128, 128, 128, 0.5)'
                                              }
                                          }
                                      },
                                      emphasis: {
                                          lineStyle: {
                                              width: 1,
                                              color: 'rgba(128, 128, 128, 0.5)'
                                          },
                                          chordStyle: {
                                              lineStyle: {
                                                  width: 1,
                                                  color: 'rgba(128, 128, 128, 0.5)'
                                              }
                                          }
                                      }
                                  }
                              },
                              gauge: {
                                  startAngle: 225,
                                  endAngle: -45,
                                  axisLine: {
                                      show: true,
                                      lineStyle: {
                                          color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                                          width: 8
                                      }
                                  },
                                  axisTick: {
                                      splitNumber: 10,
                                      length: 12,
                                      lineStyle: {
                                          color: 'auto'
                                      }
                                  },
                                  axisLabel: {
                                      textStyle: {
                                          color: 'auto'
                                      }
                                  },
                                  splitLine: {
                                      length: 18,
                                      lineStyle: {
                                          color: 'auto'
                                      }
                                  },
                                  pointer: {
                                      length: '90%',
                                      color: 'auto'
                                  },
                                  title: {
                                      textStyle: {
                                          color: '#333'
                                      }
                                  },
                                  detail: {
                                      textStyle: {
                                          color: 'auto'
                                      }
                                  }
                              },
                              textStyle: {
                                  fontFamily: 'Arial, Verdana, sans-serif'
                              }
                          };
                  var echartPie = echarts.init(document.getElementById('echart_pie'), theme);
                  var echartPie2 = echarts.init(document.getElementById('echart_pie2'), theme);
                  var echartPie3 = echarts.init(document.getElementById('echart_pie3'), theme);

                  echartPie2.setOption({
                    tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b} : {c} Sq. ({d}%)"
                    },
                    legend: {
                      x: 'center',
                      y: 'bottom',
                      data: ['Commerce', 'Mixed Use', 'Residential',
                              'Green Area', 'Service', 'Manufacturing & Storage',
                              'Administrative', 'Recreation']
                    },
                    toolbox: {
                      show: true,
                      feature: {
                        magicType: {
                          show: true,
                          type: ['pie', 'funnel'],
                          option: {
                            funnel: {
                              x: '25%',
                              width: '50%',
                              funnelAlign: 'center',
                              max: total_occupied
                            }
                          }
                        },
                        restore: {
                          show: true,
                          title: "Restore"
                        },
                        saveAsImage: {
                          show: true,
                          title: "Save Image"
                        }
                      }
                    },
                    calculable: true,
                    series: [{
                      name: 'Overview of lands allocated by land usage',
                      type: 'pie',
                      radius: ['35%', '55%'],
                      itemStyle: {
                        normal: {
                          label: {
                            show: true
                          },
                          labelLine: {
                            show: true
                          }
                        },
                        emphasis: {
                          label: {
                            show: true,
                            position: 'center',
                            textStyle: {
                              fontSize: '14',
                              fontWeight: 'normal'
                            }
                          }
                        }
                      },
                      data: [{
                        value: total_commerce,
                        name: 'Commerce'
                      }, {
                        value: total_mixed,
                        name: 'Mixed'
                      }, {
                        value: total_residential,
                        name: 'Residential'
                      }, {
                        value: total_green,
                        name: 'Green Area'
                      }, {
                        value: total_service,
                        name: 'Service'
                      }, {
                        value: total_manuf,
                        name: 'Manufacturing & Storage'
                      }, {
                        value: total_administrative,
                        name: 'Administrative'
                      }, {
                        value: total_recreation,
                        name: 'Recreation'
                      }]
                    }]
                  });

                  echartPie3.setOption({
                    tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b} : {c} Sq. ({d}%)"
                    },
                    legend: {
                      x: 'center',
                      y: 'bottom',
                      data: ['ክፍት ቦታ', 'በመልሶ ማልማት የተዘጋጀ ቦታ', 'ማስፋፍያ አካባቢ',
                              'በይዞታ ማረጋገጫ ያልተያዙ አረንጓዴ ቦታዎች፣ የህዝብ መዝናኛዎች እና መናፈሻዎች፣', 'በጊዜያዊ ሊዝ ወይም በኪራይ ለጊዜያዊ መጠቀሚያነት የተያዙ ቦታዎች']
                    },
                    toolbox: {
                      show: true,
                      feature: {
                        magicType: {
                          show: true,
                          type: ['pie', 'funnel'],
                          option: {
                            funnel: {
                              x: '25%',
                              width: '50%',
                              funnelAlign: 'center',
                              max: total_land
                            }
                          }
                        },
                        restore: {
                          show: true,
                          title: "Restore"
                        },
                        saveAsImage: {
                          show: true,
                          title: "Save Image"
                        }
                      }
                    },
                    calculable: true,
                    series: [{
                      name: 'Overview of lands banked by type',
                      type: 'pie',
                      radius: ['35%', '55%'],
                      itemStyle: {
                        normal: {
                          label: {
                            show: true
                          },
                          labelLine: {
                            show: true
                          }
                        },
                        emphasis: {
                          label: {
                            show: true,
                            position: 'center',
                            textStyle: {
                              fontSize: '14',
                              fontWeight: 'normal'
                            }
                          }
                        }
                      },
                      data: [{
                        value: total_open,
                        name: 'ክፍት ቦታ'
                      }, {
                        value: total_redev_land,
                        name: 'በመልሶ ማልማት የተዘጋጀ ቦታ'
                      }, {
                        value: total_expansion,
                        name: 'ማስፋፍያ አካባቢ'
                      }, {
                        value: total_noDeed_green,
                        name: 'በይዞታ ማረጋገጫ ያልተያዙ አረንጓዴ ቦታዎች፣ የህዝብ መዝናኛዎች እና መናፈሻዎች'
                      }, {
                        value: total_temp_land,
                        name: 'በጊዜያዊ ሊዝ ወይም በኪራይ ለጊዜያዊ መጠቀሚያነት የተያዙ ቦታዎች'
                      }]
                    }]
                  });

                  echartPie.setOption({
                    tooltip: {
                      trigger: 'item',
                      formatter: "{a} <br/>{b} : {c} Sq. ({d}%)"
                    },
                    legend: {
                      x: 'center',
                      y: 'bottom',
                      data: ['Unoccupied Land', 'Land Allocated by Bid', 'Land Allocated by Merit']
                    },
                    toolbox: {
                      show: true,
                      feature: {
                        magicType: {
                          show: true,
                          type: ['pie', 'funnel'],
                          option: {
                            funnel: {
                              x: '25%',
                              width: '50%',
                              funnelAlign: 'left',
                              max: total_land
                            }
                          }
                        },
                        restore: {
                          show: true,
                          title: "Restore"
                        },
                        saveAsImage: {
                          show: true,
                          title: "Save Image"
                        }
                      }
                    },
                    calculable: true,
                    series: [{
                      name: 'Overall Land Bank',
                      type: 'pie',
                      radius: '55%',
                      center: ['50%', '48%'],
                      data: [{
                        value: total_unoccupied,
                        name: 'Unoccupied Land'
                      }, {
                        value: total_bid,
                        name: 'Land Allocated by Bid'
                      }, {
                        value: total_merit,
                        name: 'Land Allocated by Merit'
                      }]
                    }]
                  });
           });

        

      

      // });
    </script>
    <!-- /Datatables -->