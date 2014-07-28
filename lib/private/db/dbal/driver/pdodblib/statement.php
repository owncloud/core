<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the LGPL. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace OC\DB\DBAL\Driver\PDODblib;

use Doctrine\DBAL\Driver\PDOStatement;

class Statement
{
	private $rows = array();

	/** @var PDOStatement */
	private $statement;

	public function __construct($statement) {
		$this->statement = $statement;
	}

	public function execute ($input_parameters = null) {
		$this->rows = array();
		$ret = $this->statement->execute($input_parameters);
		if ($ret) {
			$this->rows = $this->statement->fetchAll();

			// due to crazy implementations in freetds we need to handle ' ' in a special manner
			$this->rows = array_map(function ($row) {
				return array_map(function($value) {
					if ($value === ' ') {
						return '';
					}
					return $value;
				}, $row);
			}, $this->rows);
		}
	}

	public function fetch ($fetch_style = null, $cursor_orientation = \PDO::FETCH_ORI_NEXT, $cursor_offset = 0) {
		if (empty($this->rows)) {
			return false;
		}
		return array_shift($this->rows);
	}

	public function fetchAll ($fetch_style = null, $fetch_argument = null, array $ctor_args = array()) {
		$result = $this->rows;
		$this->rows = array();
		return $result;
	}

	public function fetchColumn ($column_number = 0) {
		if (empty($this->rows)) {
			return false;
		}

		$result = array_shift($this->rows);
		if (isset($result[$column_number])) {
			return $result[$column_number];
		}
		$values = array_values($result);
		if (isset($values[$column_number])) {
			return $values[$column_number];
		}

		return false;
	}

	public function __call($name,$arguments) {
		return call_user_func_array(array($this->statement,$name), $arguments);
	}

}
