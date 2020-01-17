<?php
declare(strict_types=1);

use GraphQL\Query;
use PHPUnit\Framework\TestCase;
use Wappr\Cloudflare\Contracts\SelectionSetInterface;
use Wappr\Cloudflare\SelectionSets\AbstractSelectionSet;
use Wappr\Cloudflare\SelectionSets\HttpRequests\Average;

final class SelectionSetAverageTest extends TestCase
{
    public function testAverageGetSelectionReturnsQuery(): void
    {
        $this->assertInstanceOf(Query::class, (new Average)->getSelection());
    }

    public function testAverageImplementsSelectionSetInterface(): void
    {
        $this->assertInstanceOf(SelectionSetInterface::class, new Average);
    }

    public function testAverageExtendsAbstractSelectionSet():void
    {
        $this->assertInstanceOf(AbstractSelectionSet::class, new Average);
    }
}
