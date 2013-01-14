<?php
// +----------------------------------------------------------------------+
// | PHP versions 4 and 5                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 1998-2007 Manuel Lemos, Tomas V.V.Cox,                 |
// | Stig. S. Bakken, Lukas Smith, Frank M. Kromann, Lorenzo Alberton     |
// | All rights reserved.                                                 |
// +----------------------------------------------------------------------+
// | MDB2 is a merge of PEAR DB and Metabases that provides a unified DB  |
// | API as well as database abstraction for PHP applications.            |
// | This LICENSE is in the BSD license style.                            |
// |                                                                      |
// | Redistribution and use in source and binary forms, with or without   |
// | modification, are permitted provided that the following conditions   |
// | are met:                                                             |
// |                                                                      |
// | Redistributions of source code must retain the above copyright       |
// | notice, this list of conditions and the following disclaimer.        |
// |                                                                      |
// | Redistributions in binary form must reproduce the above copyright    |
// | notice, this list of conditions and the following disclaimer in the  |
// | documentation and/or other materials provided with the distribution. |
// |                                                                      |
// | Neither the name of Manuel Lemos, Tomas V.V.Cox, Stig. S. Bakken,    |
// | Lukas Smith nor the names of his contributors may be used to endorse |
// | or promote products derived from this software without specific prior|
// | written permission.                                                  |
// |                                                                      |
// | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  |
// | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT    |
// | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS    |
// | FOR A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE      |
// | REGENTS OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,          |
// | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, |
// | BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS|
// |  OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED  |
// | AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT          |
// | LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY|
// | WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE          |
// | POSSIBILITY OF SUCH DAMAGE.                                          |
// +----------------------------------------------------------------------+
// | Authors: Lukas Smith <smith@pooteeweet.org>                          |
// |          Lorenzo Alberton <l.alberton@quipo.it>                      |
// +----------------------------------------------------------------------+

require_once 'MDB2/Driver/Reverse/Common.php';

/**
 * MDB2 MSSQL driver for the schema reverse engineering module
 *
 * @package MDB2
 * @category Database
 * @author  Lukas Smith <smith@dybnet.de>
 * @author  Lorenzo Alberton <l.alberton@quipo.it>
 */
class MDB2_Driver_Reverse_sqlsrv extends MDB2_Driver_Reverse_Common
{
    // {{{ getTableFieldDefinition()

    /**
     * Get the structure of a field into an array
     *
     * @param string $table_name name of table that should be used in method
     * @param string $field_name name of field that should be used in method
     * @return mixed data array on success, a MDB2 error on failure
     * @access public
     */
    function getTableFieldDefinition($table_name, $field_name)
    {
        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        $result = $db->loadModule('Datatype', null, true);
        if (PEAR::isError($result)) {
            return $result;
        }

        list($schema, $table) = $this->splitTableSchema($table_name);

        $table = $db->quoteIdentifier($table, true);
        $fldname = $db->quoteIdentifier($field_name, true);

        $query = "SELECT t.table_name,
                         c.column_name 'name',
                         c.data_type 'type',
                         CASE c.is_nullable WHEN 'YES' THEN 1 ELSE 0 END AS 'is_nullable',
                         c.column_default,
                         c.character_maximum_length 'length',
                         c.numeric_precision,
                         c.numeric_scale,
                         c.character_set_name,
                         c.collation_name
                    FROM INFORMATION_SCHEMA.TABLES t,
                         INFORMATION_SCHEMA.COLUMNS c
                   WHERE t.table_name = c.table_name
                     AND t.table_name = '$table'
                     AND c.column_name = '$fldname'";
        if (!empty($schema)) {
            $query .= " AND t.table_schema = '" .$db->quoteIdentifier($schema, true) ."'";
        }
        $query .= ' ORDER BY t.table_name';
        $column = $db->queryRow($query, null, MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($column)) {
            return $column;
        }
        if (empty($column)) {
            return $db->raiseError(MDB2_ERROR_NOT_FOUND, null, null,
                'it was not specified an existing table column', __FUNCTION__);
        }

        if ($db->options['portability'] & MDB2_PORTABILITY_FIX_CASE) {
            if ($db->options['field_case'] == CASE_LOWER) {
                $column['name'] = strtolower($column['name']);
            } else {
                $column['name'] = strtoupper($column['name']);
            }
        } else {
            $column = array_change_key_case($column, $db->options['field_case']);
        }
        $mapped_datatype = $db->datatype->mapNativeDatatype($column);
        if (PEAR::isError($mapped_datatype)) {
            return $mapped_datatype;
        }
        list($types, $length, $unsigned, $fixed) = $mapped_datatype;
        $notnull = true;
        if ($column['is_nullable']) {
            $notnull = false;
        }
        $default = false;
        if (array_key_exists('column_default', $column)) {
            $default = $column['column_default'];
            if ((null === $default) && $notnull) {
                $default = '';
            } elseif (strlen($default) > 4
                   && substr($default, 0, 1) == '('
                   &&  substr($default, -1, 1) == ')'
            ) {
                //mssql wraps the default value in parentheses: "((1234))", "(NULL)"
                $default = trim($default, '()');
                if ($default == 'NULL') {
                    $default = null;
                }
            }
        }
        $definition[0] = array(
            'notnull' => $notnull,
            'nativetype' => preg_replace('/^([a-z]+)[^a-z].*/i', '\\1', $column['type'])
        );
        if (null !== $length) {
            $definition[0]['length'] = $length;
        }
        if (null !== $unsigned) {
            $definition[0]['unsigned'] = $unsigned;
        }
        if (null !== $fixed) {
            $definition[0]['fixed'] = $fixed;
        }
        if ($default !== false) {
            $definition[0]['default'] = $default;
        }
        foreach ($types as $key => $type) {
            $definition[$key] = $definition[0];
            if ($type == 'clob' || $type == 'blob') {
                unset($definition[$key]['default']);
            }
            $definition[$key]['type'] = $type;
            $definition[$key]['mdb2type'] = $type;
        }
        return $definition;
    }

    // }}}
    // {{{ getTableIndexDefinition()

    /**
     * Get the structure of an index into an array
     *
     * @param string $table_name name of table that should be used in method
     * @param string $index_name name of index that should be used in method
     * @return mixed data array on success, a MDB2 error on failure
     * @access public
     */
    function getTableIndexDefinition($table_name, $index_name)
    {
        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        list($schema, $table) = $this->splitTableSchema($table_name);

        $table = $db->quoteIdentifier($table, true);
        //$idxname = $db->quoteIdentifier($index_name, true);

        $query = "SELECT OBJECT_NAME(i.id) tablename,
                         i.name indexname,
                         c.name field_name,
                         CASE INDEXKEY_PROPERTY(i.id, i.indid, ik.keyno, 'IsDescending')
                           WHEN 1 THEN 'DESC' ELSE 'ASC'
                         END 'collation',
                         ik.keyno 'position'
                    FROM sysindexes i
                    JOIN sysindexkeys ik ON ik.id = i.id AND ik.indid = i.indid
                    JOIN syscolumns c ON c.id = ik.id AND c.colid = ik.colid
                   WHERE OBJECT_NAME(i.id) = '$table'
                     AND i.name = '%s'
                     AND NOT EXISTS (
                            SELECT *
                              FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE k
                             WHERE k.table_name = OBJECT_NAME(i.id)
                               AND k.constraint_name = i.name";
        if (!empty($schema)) {
            $query .= " AND k.table_schema = '" .$db->quoteIdentifier($schema, true) ."'";
        }
        $query .= ')
                ORDER BY tablename, indexname, ik.keyno';

        $index_name_mdb2 = $db->getIndexName($index_name);
        $result = $db->queryRow(sprintf($query, $index_name_mdb2));
        if (!PEAR::isError($result) && (null !== $result)) {
            // apply 'idxname_format' only if the query succeeded, otherwise
            // fallback to the given $index_name, without transformation
            $index_name = $index_name_mdb2;
        }
        $result = $db->query(sprintf($query, $index_name));
        if (PEAR::isError($result)) {
            return $result;
        }

        $definition = array();
        while (is_array($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC))) {
            $column_name = $row['field_name'];
            if ($db->options['portability'] & MDB2_PORTABILITY_FIX_CASE) {
                if ($db->options['field_case'] == CASE_LOWER) {
                    $column_name = strtolower($column_name);
                } else {
                    $column_name = strtoupper($column_name);
                }
            }
            $definition['fields'][$column_name] = array(
                'position' => (int)$row['position'],
            );
            if (!empty($row['collation'])) {
                $definition['fields'][$column_name]['sorting'] = ($row['collation'] == 'ASC'
                    ? 'ascending' : 'descending');
            }
        }
        $result->free();
        if (empty($definition['fields'])) {
            return $db->raiseError(MDB2_ERROR_NOT_FOUND, null, null,
                'it was not specified an existing table index', __FUNCTION__);
        }
        return $definition;
    }

    // }}}
    // {{{ getTableConstraintDefinition()

    /**
     * Get the structure of a constraint into an array
     *
     * @param string $table_name      name of table that should be used in method
     * @param string $constraint_name name of constraint that should be used in method
     * @return mixed data array on success, a MDB2 error on failure
     * @access public
     */
    function getTableConstraintDefinition($table_name, $constraint_name)
    {
        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        list($schema, $table) = $this->splitTableSchema($table_name);

        $table = $db->quoteIdentifier($table, true);
        $query = "SELECT k.table_name,
                         k.column_name field_name,
                         CASE c.constraint_type WHEN 'PRIMARY KEY' THEN 1 ELSE 0 END 'primary',
                         CASE c.constraint_type WHEN 'UNIQUE' THEN 1 ELSE 0 END 'unique',
                         CASE c.constraint_type WHEN 'FOREIGN KEY' THEN 1 ELSE 0 END 'foreign',
                         CASE c.constraint_type WHEN 'CHECK' THEN 1 ELSE 0 END 'check',
                         CASE c.is_deferrable WHEN 'NO' THEN 0 ELSE 1 END 'deferrable',
                         CASE c.initially_deferred WHEN 'NO' THEN 0 ELSE 1 END 'initiallydeferred',
                         rc.match_option 'match',
                  	 rc.update_rule 'onupdate',
                         rc.delete_rule 'ondelete',
                         kcu.table_name 'references_table',
                         kcu.column_name 'references_field',
                         k.ordinal_position 'field_position'
                    FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE k
                    LEFT JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS c
                      ON k.table_name = c.table_name
                     AND k.table_schema = c.table_schema
                     AND k.table_catalog = c.table_catalog
                     AND k.constraint_catalog = c.constraint_catalog
                     AND k.constraint_name = c.constraint_name
               LEFT JOIN INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS rc
                      ON rc.constraint_schema = c.constraint_schema
                     AND rc.constraint_catalog = c.constraint_catalog
                     AND rc.constraint_name = c.constraint_name
               LEFT JOIN INFORMATION_SCHEMA.KEY_COLUMN_USAGE kcu
                      ON rc.unique_constraint_schema = kcu.constraint_schema
                     AND rc.unique_constraint_catalog = kcu.constraint_catalog
                     AND rc.unique_constraint_name = kcu.constraint_name
					 AND k.ordinal_position = kcu.ordinal_position
                   WHERE k.constraint_catalog = DB_NAME()
                     AND k.table_name = '$table'
                     AND k.constraint_name = '%s'";
        if (!empty($schema)) {
            $query .= " AND k.table_schema = '" .$db->quoteIdentifier($schema, true) ."'";
        }
        $query .= ' ORDER BY k.constraint_name,
                             k.ordinal_position';

        $constraint_name_mdb2 = $db->getIndexName($constraint_name);
        $result = $db->queryRow(sprintf($query, $constraint_name_mdb2));
        if (!PEAR::isError($result) && (null !== $result)) {
            // apply 'idxname_format' only if the query succeeded, otherwise
            // fallback to the given $index_name, without transformation
            $constraint_name = $constraint_name_mdb2;
        }
        $result = $db->query(sprintf($query, $constraint_name));
        if (PEAR::isError($result)) {
            return $result;
        }

        $definition = array(
            'fields' => array()
        );
        while (is_array($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC))) {
            $row = array_change_key_case($row, CASE_LOWER);
            $column_name = $row['field_name'];
            if ($db->options['portability'] & MDB2_PORTABILITY_FIX_CASE) {
                if ($db->options['field_case'] == CASE_LOWER) {
                    $column_name = strtolower($column_name);
                } else {
                    $column_name = strtoupper($column_name);
                }
            }
            $definition['fields'][$column_name] = array(
                'position' => (int)$row['field_position']
            );
            if ($row['foreign']) {
                $ref_column_name = $row['references_field'];
                if ($db->options['portability'] & MDB2_PORTABILITY_FIX_CASE) {
                    if ($db->options['field_case'] == CASE_LOWER) {
                        $ref_column_name = strtolower($ref_column_name);
                    } else {
                        $ref_column_name = strtoupper($ref_column_name);
                    }
                }
                $definition['references']['table'] = $row['references_table'];
                $definition['references']['fields'][$ref_column_name] = array(
                    'position' => (int)$row['field_position']
                );
            }
            //collation?!?
            /*
            if (!empty($row['collation'])) {
                $definition['fields'][$column_name]['sorting'] = ($row['collation'] == 'ASC'
                    ? 'ascending' : 'descending');
            }
            */
            $lastrow = $row;
            // otherwise $row is no longer usable on exit from loop
        }
        $result->free();
        if (empty($definition['fields'])) {
            return $db->raiseError(MDB2_ERROR_NOT_FOUND, null, null,
                $constraint_name . ' is not an existing table constraint', __FUNCTION__);
        }

        $definition['primary'] = (boolean)$lastrow['primary'];
        $definition['unique']  = (boolean)$lastrow['unique'];
        $definition['foreign'] = (boolean)$lastrow['foreign'];
        $definition['check']   = (boolean)$lastrow['check'];
        $definition['deferrable'] = (boolean)$lastrow['deferrable'];
        $definition['initiallydeferred'] = (boolean)$lastrow['initiallydeferred'];
        $definition['onupdate'] = $lastrow['onupdate'];
        $definition['ondelete'] = $lastrow['ondelete'];
        $definition['match']    = $lastrow['match'];

        return $definition;
    }

    // }}}
    // {{{ getTriggerDefinition()

    /**
     * Get the structure of a trigger into an array
     *
     * EXPERIMENTAL
     *
     * WARNING: this function is experimental and may change the returned value
     * at any time until labelled as non-experimental
     *
     * @param string    $trigger    name of trigger that should be used in method
     * @return mixed data array on success, a MDB2 error on failure
     * @access public
     */
    function getTriggerDefinition($trigger)
    {
        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        $query = "SELECT sys1.name trigger_name,
                         sys2.name table_name,
                         c.text trigger_body,
                         c.encrypted is_encripted,
                         CASE
                           WHEN OBJECTPROPERTY(sys1.id, 'ExecIsTriggerDisabled') = 1
                           THEN 0 ELSE 1
                         END trigger_enabled,
                         CASE
                           WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1
                           THEN 'INSERT'
                           WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1
                           THEN 'UPDATE'
                           WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1
                           THEN 'DELETE'
                         END trigger_event,
                         CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1
                           THEN 'INSTEAD OF' ELSE 'AFTER'
                         END trigger_type,
                         '' trigger_comment
                    FROM sysobjects sys1
                    JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
                    JOIN syscomments c ON sys1.id = c.id
                   WHERE sys1.xtype = 'TR'
                     AND sys1.name = ". $db->quote($trigger, 'text');

        $types = array(
            'trigger_name'    => 'text',
            'table_name'      => 'text',
            'trigger_body'    => 'text',
            'trigger_type'    => 'text',
            'trigger_event'   => 'text',
            'trigger_comment' => 'text',
            'trigger_enabled' => 'boolean',
            'is_encripted'    => 'boolean',
        );

        $def = $db->queryRow($query, $types, MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($def)) {
            return $def;
        }
        $trg_body = $db->queryCol('EXEC sp_helptext '. $db->quote($trigger, 'text'), 'text');
        if (!PEAR::isError($trg_body)) {
            $def['trigger_body'] = implode(' ', $trg_body);
        }
        return $def;
    }

    // }}}
    // {{{ tableInfo()

    /**
     * Returns information about a table or a result set
     *
     * NOTE: only supports 'table' and 'flags' if <var>$result</var>
     * is a table name.
     *
     * @param object|string  $result  MDB2_result object from a query or a
     *                                 string containing the name of a table.
     *                                 While this also accepts a query result
     *                                 resource identifier, this behavior is
     *                                 deprecated.
     * @param int            $mode    a valid tableInfo mode
     *
     * @return array  an associative array with the information requested.
     *                 A MDB2_Error object on failure.
     *
     * @see MDB2_Driver_Common::tableInfo()
     */
    function tableInfo($result, $mode = null)
    {
        if (is_string($result)) {
           return parent::tableInfo($result, $mode);
        }

        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        $resource = MDB2::isResultCommon($result) ? $result->getResource() : $result;
        if (!is_resource($resource)) {
            return $db->raiseError(MDB2_ERROR_NEED_MORE_DATA, null, null,
                'Could not generate result resource', __FUNCTION__);
        }

        if ($db->options['portability'] & MDB2_PORTABILITY_FIX_CASE) {
            if ($db->options['field_case'] == CASE_LOWER) {
                $case_func = 'strtolower';
            } else {
                $case_func = 'strtoupper';
            }
        } else {
            $case_func = 'strval';
        }

        $meta = @sqlsrv_field_metadata($resource);
        $count = count($meta);
        $res   = array();

        if ($mode) {
            $res['num_fields'] = $count;
        }

        $db->loadModule('Datatype', null, true);
        for ($i = 0; $i < $count; $i++) {
            $res[$i] = array(
                'table' => '',
                'name'              => $case_func($meta[$i]['Name']),
                'type'              => $meta[$i]['Type'],
                'length'            => $meta[$i]['Size'],
                'numeric_precision' => $meta[$i]['Precision'],
                'numeric_scale'     => $meta[$i]['Scale'],
                'flags'             => ''
            );
            $mdb2type_info = $db->datatype->mapNativeDatatype($res[$i]);
            if (PEAR::isError($mdb2type_info)) {
               return $mdb2type_info;
            }
            $res[$i]['mdb2type'] = $mdb2type_info[0][0];
            if ($mode & MDB2_TABLEINFO_ORDER) {
                $res['order'][$res[$i]['name']] = $i;
            }
            if ($mode & MDB2_TABLEINFO_ORDERTABLE) {
                $res['ordertable'][$res[$i]['table']][$res[$i]['name']] = $i;
            }
        }

        return $res;
    }

    // }}}
    // {{{ _mssql_field_flags()

    /**
     * Get a column's flags
     *
     * Supports "not_null", "primary_key",
     * "auto_increment" (mssql identity), "timestamp" (mssql timestamp),
     * "unique_key" (mssql unique index, unique check or primary_key) and
     * "multiple_key" (multikey index)
     *
     * mssql timestamp is NOT similar to the mysql timestamp so this is maybe
     * not useful at all - is the behaviour of mysql_field_flags that primary
     * keys are alway unique? is the interpretation of multiple_key correct?
     *
     * @param string $table   the table name
     * @param string $column  the field name
     *
     * @return string  the flags
     *
     * @access protected
     * @author Joern Barthel <j_barthel@web.de>
     */
    function _mssql_field_flags($table, $column)
    {
        $db = $this->getDBInstance();
        if (PEAR::isError($db)) {
            return $db;
        }

        static $tableName = null;
        static $flags = array();

        if ($table != $tableName) {

            $flags = array();
            $tableName = $table;

            // get unique and primary keys
            $res = $db->queryAll("EXEC SP_HELPINDEX[$table]", null, MDB2_FETCHMODE_ASSOC);

            foreach ($res as $val) {
                $val = array_change_key_case($val, CASE_LOWER);
                $keys = explode(', ', $val['index_keys']);

                if (sizeof($keys) > 1) {
                    foreach ($keys as $key) {
                        $this->_add_flag($flags[$key], 'multiple_key');
                    }
                }

                if (strpos($val['index_description'], 'primary key')) {
                    foreach ($keys as $key) {
                        $this->_add_flag($flags[$key], 'primary_key');
                    }
                } elseif (strpos($val['index_description'], 'unique')) {
                    foreach ($keys as $key) {
                        $this->_add_flag($flags[$key], 'unique_key');
                    }
                }
            }

            // get auto_increment, not_null and timestamp
            $res = $db->queryAll("EXEC SP_COLUMNS[$table]", null, MDB2_FETCHMODE_ASSOC);

            foreach ($res as $val) {
                $val = array_change_key_case($val, CASE_LOWER);
                if ($val['nullable'] == '0') {
                    $this->_add_flag($flags[$val['column_name']], 'not_null');
                }
                if (strpos($val['type_name'], 'identity')) {
                    $this->_add_flag($flags[$val['column_name']], 'auto_increment');
                }
                if (strpos($val['type_name'], 'timestamp')) {
                    $this->_add_flag($flags[$val['column_name']], 'timestamp');
                }
            }
        }

        if (!empty($flags[$column])) {
            return(implode(' ', $flags[$column]));
        }
        return '';
    }

    // }}}
    // {{{ _add_flag()

    /**
     * Adds a string to the flags array if the flag is not yet in there
     * - if there is no flag present the array is created
     *
     * @param array  &$array  the reference to the flag-array
     * @param string $value   the flag value
     *
     * @return void
     *
     * @access protected
     * @author Joern Barthel <j_barthel@web.de>
     */
    function _add_flag(&$array, $value)
    {
        if (!is_array($array)) {
            $array = array($value);
        } elseif (!in_array($value, $array)) {
            array_push($array, $value);
        }
    }

    // }}}
}
?>
