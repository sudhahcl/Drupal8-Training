<?php

namespace Drupal\custom_user\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Custom configuration controller.
 *
 * @package Drupal\custom_user\Controller
 */
class ContentUserController extends ControllerBase {

  /**
   * Database connection class.
   *
   * @var Drupal\Core\Database\Database
   */
  private $database;

  /**
   * Controller construct.
   */
  public function __construct() {
    $this->database = Database::getConnection();
  }

}
