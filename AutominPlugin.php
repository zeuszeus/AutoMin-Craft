<?php
/**
 * Automin plugin
 *
 * @author André Elvan
 */

namespace Craft;

class AutominPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('AutoMin');
    }

    public function getVersion()
    {
        return '0.1';
    }

    public function getDeveloper()
    {
        return 'André Elvan';
    }

    public function getDeveloperUrl()
    {
        return 'http://vaersaagod.no';
    }

    public function hasCpSection()
    {
        return false;
    }


    /**
     * Register twig extension
     */
    public function hookAddTwigExtension()
    {
        Craft::import('plugins.automin.twigextensions.AutominTwigExtension');

        return new AutominTwigExtension();
    }
 
  
  protected function defineSettings()
  {
    return array(
         'autominEnabled' => array(AttributeType::Bool, 'default' => true),
         'autominCachingEnabled' => array(AttributeType::Bool, 'default' => true),
         'autominCachePath' => array(AttributeType::String, 'default' => ''),
         'autominCacheURL' => array(AttributeType::String, 'default' => ''),
    );
  }
  
  public function getSettingsHtml()
  {
    $config_settings = array();
    $config_settings['autominEnabled'] = craft()->config->get('autominEnabled');
    $config_settings['autominCachingEnabled'] = craft()->config->get('autominCachingEnabled');
    $config_settings['autominCachePath'] = craft()->config->get('autominCachePath');
    $config_settings['autominCacheURL'] = craft()->config->get('autominCacheURL');
    
    return craft()->templates->render('automin/settings', array(
      'settings' => $this->getSettings(),
      'config_settings' => $config_settings
    ));
  }  
}